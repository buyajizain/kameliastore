<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LeadController extends Controller
{
    /**
     * Display a listing of CRM Leads.
     */
    public function index(Request $request)
    {
        $query = Lead::query();

        // Filter by platform
        if ($request->filled('platform') && $request->platform !== 'all') {
            $query->where('platform', $request->platform);
        }

        // Filter by status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by search query
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('handle', 'like', "%{$search}%")
                  ->orWhere('target_brand', 'like', "%{$search}%")
                  ->orWhere('raw_inquiry', 'like', "%{$search}%")
                  ->orWhere('matched_product_title', 'like', "%{$search}%");
            });
        }

        $leads = $query->orderBy('created_at', 'desc')->paginate(15);

        // Calculate statistics
        $stats = [
            'total' => Lead::count(),
            'new' => Lead::where('status', 'new')->count(),
            'active' => Lead::whereIn('status', ['contacted', 'interested'])->count(),
            'closed' => Lead::where('status', 'closed')->count(),
            'potential_revenue' => Lead::where('status', '!=', 'lost')->sum('matched_product_price') ?: 0,
        ];

        return view('leads.index', compact('leads', 'stats'));
    }

    /**
     * Store a newly created lead in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'handle' => 'nullable|string|max:255',
            'platform' => 'required|string|in:instagram,twitter,carousell,tiktok,facebook,whatsapp',
            'contact' => 'nullable|string|max:255',
            'target_brand' => 'nullable|string|max:100',
            'target_category' => 'nullable|string|max:100',
            'raw_inquiry' => 'nullable|string',
            'budget_max' => 'nullable|numeric|min:0',
            'status' => 'nullable|string|in:new,contacted,interested,closed,lost',
            'notes' => 'nullable|string',
        ]);

        // Run AI Matchmaking to find best product match
        $match = $this->findBestProductMatch(
            $validated['target_brand'] ?? '',
            $validated['target_category'] ?? '',
            $validated['raw_inquiry'] ?? '',
            $validated['budget_max'] ?? null
        );

        if ($match) {
            $validated['matched_product_id'] = $match['id'];
            $validated['matched_product_title'] = $match['title'];
            $validated['matched_product_price'] = $match['selling_idr'];
            $validated['matched_product_image'] = $match['image_local'] ?? $match['image_url_remote'] ?? '';
            $validated['outreach_message'] = $this->generateOutreachDraft($validated, $match);
        }

        $lead = Lead::create($validated);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'lead' => $lead]);
        }

        return redirect()->route('leads.index')->with('success', "Prospek {$lead->name} berhasil ditambahkan & dicocokkan dengan produk Kamelia Store!");
    }

    /**
     * Update the specified lead in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'handle' => 'nullable|string|max:255',
            'platform' => 'sometimes|required|string|in:instagram,twitter,carousell,tiktok,facebook,whatsapp',
            'contact' => 'nullable|string|max:255',
            'target_brand' => 'nullable|string|max:100',
            'target_category' => 'nullable|string|max:100',
            'raw_inquiry' => 'nullable|string',
            'budget_max' => 'nullable|numeric|min:0',
            'matched_product_id' => 'nullable|string',
            'matched_product_title' => 'nullable|string',
            'matched_product_price' => 'nullable|numeric',
            'matched_product_image' => 'nullable|string',
            'status' => 'sometimes|required|string|in:new,contacted,interested,closed,lost',
            'notes' => 'nullable|string',
            'outreach_message' => 'nullable|string',
        ]);

        $lead->update($validated);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'lead' => $lead]);
        }

        return redirect()->route('leads.index')->with('success', "Data prospek {$lead->name} berhasil diperbarui!");
    }

    /**
     * Remove the specified lead from storage.
     */
    public function destroy(Lead $lead)
    {
        $name = $lead->name;
        $lead->delete();

        return redirect()->route('leads.index')->with('success', "Prospek {$name} telah dihapus dari CRM.");
    }

    /**
     * AI Quick Parser: Analyzes raw comment / tweet text, extracts brand/budget/category, and finds matching products.
     */
    public function quickMatch(Request $request)
    {
        $rawText = $request->input('text', '');
        $platform = $request->input('platform', 'instagram');

        if (empty($rawText)) {
            return response()->json(['success' => false, 'message' => 'Teks permintaan tidak boleh kosong']);
        }

        // 1. Detect Brand
        $detectedBrand = null;
        $brands = ['Coach', 'Tory Burch', 'Fossil', 'Marc Jacobs', 'Michael Kors', 'Kate Spade', 'Aigner', 'Prada', 'Longchamp', 'Gucci', 'Chanel', 'Louis Vuitton', 'Celine', 'Dior'];
        foreach ($brands as $b) {
            if (stripos($rawText, $b) !== false) {
                $detectedBrand = $b;
                break;
            }
        }

        // 2. Detect Category
        $detectedCategory = 'Tas';
        if (preg_match('/(dompet|wallet|cardholder)/i', $rawText)) {
            $detectedCategory = 'Dompet';
        } elseif (preg_match('/(jam|watch|arloji)/i', $rawText)) {
            $detectedCategory = 'Jam Tangan';
        } elseif (preg_match('/(sabuk|belt|ikat pinggang)/i', $rawText)) {
            $detectedCategory = 'Sabuk';
        }

        // 3. Detect Budget (e.g. "1.8jt", "1,5 jt", "2000k", "1500000", "under 2jt", "budget 1.2")
        $detectedBudget = null;
        if (preg_match('/(?:budget|max|under|maks|harga)\s*(?:rp\.?)?\s*([0-9]+[.,]?[0-9]*)\s*(?:jt|juta)/i', $rawText, $m)) {
            $val = str_replace(',', '.', $m[1]);
            $detectedBudget = (int) (floatval($val) * 1000000);
        } elseif (preg_match('/([0-9]+[.,]?[0-9]*)\s*(?:jt|juta)/i', $rawText, $m)) {
            $val = str_replace(',', '.', $m[1]);
            $detectedBudget = (int) (floatval($val) * 1000000);
        } elseif (preg_match('/([0-9]+)\s*k/i', $rawText, $m)) {
            $detectedBudget = (int) $m[1] * 1000;
        } elseif (preg_match('/(?:rp\.?\s*)?([0-9]{6,8})/i', $rawText, $m)) {
            $detectedBudget = (int) $m[1];
        }

        // 4. Extract username / handle if any (e.g. @clarissa_99)
        $detectedHandle = null;
        if (preg_match('/@([a-zA-Z0-9._]+)/', $rawText, $m)) {
            $detectedHandle = '@' . $m[1];
        }

        // 5. Find top 3 best matching products from Kamelia Store catalog
        $matches = $this->findTopProductMatches($detectedBrand, $detectedCategory, $rawText, $detectedBudget, 5);

        $bestMatch = $matches[0] ?? null;
        $outreachDraft = '';
        if ($bestMatch) {
            $leadData = [
                'name' => $detectedHandle ?: 'Kakak',
                'handle' => $detectedHandle,
                'platform' => $platform,
                'target_brand' => $detectedBrand ?: 'Luxury Brand',
                'raw_inquiry' => $rawText
            ];
            $outreachDraft = $this->generateOutreachDraft($leadData, $bestMatch);
        }

        return response()->json([
            'success' => true,
            'extracted' => [
                'brand' => $detectedBrand,
                'category' => $detectedCategory,
                'budget' => $detectedBudget,
                'budget_formatted' => $detectedBudget ? 'Rp ' . number_format($detectedBudget, 0, ',', '.') : null,
                'handle' => $detectedHandle,
            ],
            'matches' => $matches,
            'best_match' => $bestMatch,
            'outreach_draft' => $outreachDraft
        ]);
    }

    /**
     * Find best single product match in Kamelia Store catalog.
     */
    protected function findBestProductMatch($brand, $category, $keywords, $maxBudget = null)
    {
        $matches = $this->findTopProductMatches($brand, $category, $keywords, $maxBudget, 1);
        return $matches[0] ?? null;
    }

    /**
     * Search products.json with scoring algorithm.
     */
    protected function findTopProductMatches($brand, $category, $keywords, $maxBudget = null, $limit = 5)
    {
        $productsJsonPath = public_path('data/products.json');
        if (!File::exists($productsJsonPath)) {
            return [];
        }

        $products = json_decode(File::get($productsJsonPath), true) ?: [];
        $scored = [];

        $keywordsLower = strtolower($keywords);
        $brandLower = strtolower($brand ?: '');
        $categoryLower = strtolower($category ?: '');

        foreach ($products as $p) {
            $score = 0;
            $pTitle = strtolower($p['title'] ?? '');
            $pBrand = strtolower($p['brand'] ?? '');
            $pPrice = (int) ($p['selling_idr'] ?? 0);

            // 1. Brand match (Strong weight: +50)
            if ($brandLower && (str_contains($pBrand, $brandLower) || str_contains($pTitle, $brandLower))) {
                $score += 50;
            }

            // 2. Category match (+20)
            if ($categoryLower && (str_contains($pTitle, $categoryLower) || str_contains($pTitle, 'tas') && $categoryLower === 'tas')) {
                $score += 20;
            }

            // 3. Keyword bonus (+5 per match)
            $tokens = preg_split('/\s+/', $keywordsLower);
            foreach ($tokens as $t) {
                if (strlen($t) > 3 && str_contains($pTitle, $t)) {
                    $score += 10;
                }
            }

            // 4. Budget fit
            if ($maxBudget && $pPrice > 0) {
                if ($pPrice <= $maxBudget) {
                    $score += 30; // Within budget
                } elseif ($pPrice <= ($maxBudget * 1.15)) {
                    $score += 15; // Slightly above budget (closeable)
                } else {
                    $score -= 20; // Too expensive
                }
            }

            // Must have some brand or title relevancy
            if ($score >= 30) {
                $p['match_score'] = $score;
                $scored[] = $p;
            }
        }

        // Sort by match score desc, then price
        usort($scored, function ($a, $b) {
            return $b['match_score'] <=> $a['match_score'];
        });

        return array_slice($scored, 0, $limit);
    }

    /**
     * Generate luxurious, warm, non-spam outreach message.
     */
    protected function generateOutreachDraft(array $leadData, array $product): string
    {
        $name = $leadData['handle'] ?: ($leadData['name'] ?: 'Kakak');
        $itemTitle = $product['title'] ?? 'Koleksi Luxury';
        $priceFormatted = $product['selling_idr_formatted'] ?? ('Rp ' . number_format($product['selling_idr'] ?? 0, 0, ',', '.'));
        $condition = $product['condition'] ?? 'Like New';
        $brand = $product['brand'] ?? 'Preloved Authentic';
        $catalogLink = url('/katalog') . '?search=' . urlencode($brand);

        return "Halo kak {$name}, salam kenal dari Kamelia Store Concierge ✨\n\n"
            . "Sempat lihat ketertarikan kakak mencari koleksi {$brand}. Kebetulan di kurasi Pre-Order Tokyo Jepang kami baru masuk 1 unit eksklusif:\n\n"
            . "👜 *{$itemTitle}*\n"
            . "💎 Kondisi: {$condition}\n"
            . "🏷️ Estimasi Harga PO: *{$priceFormatted}* (100% Authentic Guaranteed QC Pass)\n\n"
            . "Barangkali kakak berminat melihat rincian foto aslinya, bisa cek langsung di katalog butik kami ya kak:\n"
            . "👉 {$catalogLink}\n\n"
            . "Atau bisa langsung balas pesan ini jika ingin dibantu reservasi/tanya detail ke Concierge kami ya kak. Terima kasih! 🙏👑";
    }

    /**
     * Run automated Python Lead Hunter script on-demand.
     */
    public function runHunter(Request $request)
    {
        @set_time_limit(180); // Beri batas waktu hingga 3 menit agar tidak terkena timeout 30s PHP

        $scriptPath = base_path('hunt_leads.py');
        $output = [];
        $returnCode = 0;

        exec("python \"{$scriptPath}\" 2>&1", $output, $returnCode);

        $outputText = implode("\n", $output);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => ($returnCode === 0),
                'output' => $outputText,
                'total_leads' => Lead::count(),
            ]);
        }

        return redirect()->route('leads.index')->with('success', '🚀 Robot Auto-Hunter selesai memindai media sosial & berhasil memperbarui data prospek di CRM!');
    }
}
