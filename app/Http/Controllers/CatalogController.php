<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CatalogController extends Controller
{
    /**
     * Display the online boutique catalog.
     */
    public function index()
    {
        $productsJsonPath = public_path('data/products.json');
        $brandCounts = [
            'all' => 0,
            'Coach' => 0,
            'Kate Spade' => 0,
            'Michael Kors' => 0,
            'Prada' => 0,
            'Fossil' => 0,
            'Tory Burch' => 0,
            'Marc Jacobs' => 0,
            'Aigner' => 0,
        ];

        $totalProducts = 0;

        if (File::exists($productsJsonPath)) {
            $jsonContent = File::get($productsJsonPath);
            $rawProducts = json_decode($jsonContent, true) ?? [];
            $totalProducts = count($rawProducts);
            $brandCounts['all'] = $totalProducts;

            foreach ($rawProducts as $item) {
                $b = $item['brand'] ?? '';
                if (isset($brandCounts[$b])) {
                    $brandCounts[$b]++;
                }
            }
        }

        return view('catalog', compact('brandCounts', 'totalProducts'));
    }

    /**
     * API endpoint to fetch products JSON (High-Performance Compact Payload).
     */
    public function getProducts(Request $request)
    {
        $productsJsonPath = public_path('data/products.json');
        if (!File::exists($productsJsonPath)) {
            return response()->json([], 404);
        }

        // Cache the processed lightweight payload for 10 minutes
        $cacheKey = 'kamelia_catalog_compact_' . filemtime($productsJsonPath);
        $products = cache()->remember($cacheKey, 600, function () use ($productsJsonPath) {
            $jsonContent = File::get($productsJsonPath);
            $rawProducts = json_decode($jsonContent, true) ?? [];
            $compactList = [];

            foreach ($rawProducts as $item) {
                // Determine image URL
                $imgLocal = $item['image_local'] ?? '';
                $imgRemote = $item['image_url_remote'] ?? '';
                
                $filename = $imgLocal ? basename($imgLocal) : (($item['id'] ?? '') . '.jpg');
                $resolvedImg = $imgRemote;
                if (file_exists(public_path('catalog_images/' . $filename))) {
                    $resolvedImg = asset('catalog_images/' . $filename);
                }

                $sellingIdr = (int) ($item['selling_idr'] ?? 0);
                $retailIdr = (int) ($item['retail_ref_idr'] ?? ($sellingIdr > 0 ? round($sellingIdr * 1.75) : 0));

                $compactList[] = [
                    'id' => (string) ($item['id'] ?? ''),
                    'title' => (string) ($item['title'] ?? ''),
                    'brand' => (string) ($item['brand'] ?? 'Luxury'),
                    'condition' => (string) ($item['condition'] ?? 'Like New'),
                    'selling_idr' => $sellingIdr,
                    'selling_idr_formatted' => $item['selling_idr_formatted'] ?? ('Rp ' . number_format($sellingIdr, 0, ',', '.')),
                    'retail_ref_idr' => $retailIdr,
                    'retail_ref_formatted' => $item['retail_ref_formatted'] ?? ('Rp ' . number_format($retailIdr, 0, ',', '.')),
                    'image_local' => $resolvedImg,
                    'image_url_remote' => $imgRemote,
                    'photos' => $item['photos'] ?? [$resolvedImg],
                    'description' => (string) ($item['description'] ?? ''),
                    'mercari_url' => $item['mercari_url'] ?? ($item['url'] ?? ''),
                    'price_yen_raw' => $item['price_yen_raw'] ?? null,
                ];
            }

            return $compactList;
        });

        return response()->json($products)
            ->header('Cache-Control', 'public, max-age=300');
    }
}
