<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-900 border border-amber-300">
                        ⚡ AI Lead Hunter & CRM
                    </span>
                    <span class="text-xs text-slate-500 font-medium">Boutique Growth Engine</span>
                </div>
                <h2 class="font-serif font-bold text-2xl text-slate-900 leading-tight mt-1">
                    CRM Prospek & Matchmaker Produk
                </h2>
            </div>
            
            <div class="flex items-center gap-2.5 flex-wrap">
                <form method="POST" action="{{ route('leads.run-hunter') }}" onsubmit="this.querySelector('button').disabled=true; this.querySelector('button').innerHTML='⏳ Memindai...';">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-slate-950 font-extrabold text-xs px-4 py-2.5 rounded-xl shadow-md transition transform hover:-translate-y-0.5">
                        <span>🚀 Jalankan Auto-Hunter</span>
                        <span class="bg-slate-950/20 px-1.5 py-0.5 rounded text-[10px] text-slate-900 font-black">Scrape Live</span>
                    </button>
                </form>

                <button onclick="openAiMatcherModal()" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md transition transform hover:-translate-y-0.5">
                    <span>⚡ AI Quick Matcher</span>
                    <span class="bg-emerald-800/60 px-1.5 py-0.5 rounded text-[10px]">Otomatis</span>
                </button>

                <button onclick="openCreateModal()" class="inline-flex items-center gap-1.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm transition">
                    <span>➕ Tambah Manual</span>
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50/60 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Alerts -->
            @if(session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center justify-between shadow-sm animate-fade-in">
                    <div class="flex items-center gap-2.5">
                        <span class="text-lg">✓</span>
                        <span class="text-xs sm:text-sm font-semibold">{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 text-sm">✕</button>
                </div>
            @endif

            <!-- Stats Ribbon -->
            <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 sm:gap-4">
                <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                    <div class="flex items-center justify-between text-slate-500 mb-2">
                        <span class="text-[11px] font-bold uppercase tracking-wider">Total Prospek</span>
                        <span class="text-base">📥</span>
                    </div>
                    <div class="text-2xl font-black text-slate-900">{{ number_format($stats['total']) }}</div>
                    <span class="text-[10px] text-slate-400 mt-1">Semua kanal digital</span>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-amber-200 shadow-sm flex flex-col justify-between bg-amber-50/30">
                    <div class="flex items-center justify-between text-amber-700 mb-2">
                        <span class="text-[11px] font-bold uppercase tracking-wider">Prospek Baru</span>
                        <span class="text-base">🔥</span>
                    </div>
                    <div class="text-2xl font-black text-amber-900">{{ number_format($stats['new']) }}</div>
                    <span class="text-[10px] text-amber-600 mt-1">Perlu di-reach out</span>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-blue-200 shadow-sm flex flex-col justify-between bg-blue-50/30">
                    <div class="flex items-center justify-between text-blue-700 mb-2">
                        <span class="text-[11px] font-bold uppercase tracking-wider">Follow-Up Aktif</span>
                        <span class="text-base">💬</span>
                    </div>
                    <div class="text-2xl font-black text-blue-900">{{ number_format($stats['active']) }}</div>
                    <span class="text-[10px] text-blue-600 mt-1">Dalam percakapan</span>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-emerald-200 shadow-sm flex flex-col justify-between bg-emerald-50/30">
                    <div class="flex items-center justify-between text-emerald-700 mb-2">
                        <span class="text-[11px] font-bold uppercase tracking-wider">Deal Closed</span>
                        <span class="text-base">👑</span>
                    </div>
                    <div class="text-2xl font-black text-emerald-900">{{ number_format($stats['closed']) }}</div>
                    <span class="text-[10px] text-emerald-600 mt-1">Pre-Order sukses</span>
                </div>

                <div class="col-span-2 sm:col-span-1 bg-gradient-to-br from-slate-900 to-slate-800 p-4 rounded-2xl text-white shadow-sm flex flex-col justify-between">
                    <div class="flex items-center justify-between text-slate-300 mb-2">
                        <span class="text-[11px] font-bold uppercase tracking-wider">Pipeline Omset</span>
                        <span class="text-base">💎</span>
                    </div>
                    <div class="text-lg sm:text-xl font-black text-amber-300">
                        Rp {{ number_format($stats['potential_revenue'], 0, ',', '.') }}
                    </div>
                    <span class="text-[10px] text-slate-300 mt-1">Estimasi nilai produk</span>
                </div>
            </div>

            <!-- Toolbar Filters & Search -->
            <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col lg:flex-row items-center justify-between gap-4">
                <form method="GET" action="{{ route('leads.index') }}" class="w-full flex flex-wrap items-center gap-3">
                    
                    <!-- Search Input -->
                    <div class="relative flex-1 min-w-[220px]">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">🔍</span>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, @handle, brand, keyword..." 
                               class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 bg-slate-50/50">
                    </div>

                    <!-- Platform Filter -->
                    <select name="platform" onchange="this.form.submit()" class="py-2 px-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-slate-700">
                        <option value="all" {{ request('platform') == 'all' ? 'selected' : '' }}>🌐 Semua Platform</option>
                        <option value="instagram" {{ request('platform') == 'instagram' ? 'selected' : '' }}>📸 Instagram</option>
                        <option value="twitter" {{ request('platform') == 'twitter' ? 'selected' : '' }}>🐦 X (Twitter)</option>
                        <option value="carousell" {{ request('platform') == 'carousell' ? 'selected' : '' }}>🛍️ Carousell</option>
                        <option value="tiktok" {{ request('platform') == 'tiktok' ? 'selected' : '' }}>🎵 TikTok</option>
                        <option value="facebook" {{ request('platform') == 'facebook' ? 'selected' : '' }}>👥 Facebook</option>
                        <option value="whatsapp" {{ request('platform') == 'whatsapp' ? 'selected' : '' }}>💬 WhatsApp</option>
                    </select>

                    <!-- Status Filter -->
                    <select name="status" onchange="this.form.submit()" class="py-2 px-3 text-xs rounded-xl border border-slate-200 bg-slate-50/50 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-slate-700">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>⚡ Semua Status</option>
                        <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>🔥 Prospek Baru</option>
                        <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>💬 Sudah Dihubungi</option>
                        <option value="interested" {{ request('status') == 'interested' ? 'selected' : '' }}>⏳ Tertarik / Follow-up</option>
                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>👑 Deal Pre-Order</option>
                        <option value="lost" {{ request('status') == 'lost' ? 'selected' : '' }}>❌ Batal</option>
                    </select>

                    @if(request()->hasAny(['search', 'platform', 'status']))
                        <a href="{{ route('leads.index') }}" class="text-xs text-rose-600 hover:text-rose-800 font-bold px-2 py-2">
                            ✕ Reset Filter
                        </a>
                    @endif
                </form>
            </div>

            <!-- Leads CRM Table Card -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-200/80 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                <th class="py-3.5 px-4 sm:px-6">Calon Pembeli (Lead)</th>
                                <th class="py-3.5 px-4">Minat & Kebutuhan</th>
                                <th class="py-3.5 px-4">Match Produk Kamelia</th>
                                <th class="py-3.5 px-4">Status Pipeline</th>
                                <th class="py-3.5 px-4 sm:px-6 text-right">Aksi Outreach</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                            @forelse($leads as $lead)
                                @php
                                    $pInfo = $lead->platform_info;
                                    $sInfo = $lead->status_info;
                                @endphp
                                <tr class="hover:bg-slate-50/60 transition group">
                                    
                                    <!-- Lead Profile -->
                                    <td class="py-4 px-4 sm:px-6">
                                        <div class="flex items-start gap-3">
                                            <div class="w-9 h-9 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-700 shrink-0 text-sm">
                                                {{ strtoupper(substr($lead->name, 0, 1)) }}
                                            </div>
                                            <div class="space-y-1">
                                                <div class="font-bold text-slate-900 flex items-center gap-1.5">
                                                    <span>{{ $lead->name }}</span>
                                                    @if($lead->handle)
                                                        <span class="text-[11px] text-slate-400 font-normal">{{ $lead->handle }}</span>
                                                    @endif
                                                </div>
                                                <div class="flex items-center gap-1.5 flex-wrap">
                                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[10px] font-bold border {{ $pInfo['color'] }}">
                                                        <span>{{ $pInfo['icon'] }}</span>
                                                        <span>{{ $pInfo['name'] }}</span>
                                                    </span>
                                                    @if($lead->contact)
                                                        <span class="text-[11px] text-slate-500 font-medium">📞 {{ $lead->contact }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-[10px] text-slate-400">{{ $lead->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Minat & Inquiry -->
                                    <td class="py-4 px-4 max-w-[260px]">
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-1.5">
                                                <span class="px-2 py-0.5 rounded text-[10px] font-extrabold bg-slate-900 text-amber-300">
                                                    {{ $lead->target_brand ?: 'Luxury Item' }}
                                                </span>
                                                <span class="text-[11px] font-bold text-emerald-700">
                                                    {{ $lead->budget_formatted }}
                                                </span>
                                            </div>
                                            @if($lead->raw_inquiry)
                                                <p class="text-[11px] text-slate-600 italic bg-slate-50 p-2 rounded-lg border border-slate-100 line-clamp-2" title="{{ $lead->raw_inquiry }}">
                                                    "{{ $lead->raw_inquiry }}"
                                                </p>
                                            @endif
                                        </div>
                                    </td>

                                    <!-- Match Produk Kamelia -->
                                    <td class="py-4 px-4 max-w-[240px]">
                                        @if($lead->matched_product_title)
                                            <div class="flex items-center gap-2.5 p-2 bg-emerald-50/50 rounded-xl border border-emerald-100">
                                                @if($lead->matched_product_image)
                                                    <img src="{{ asset($lead->matched_product_image) }}" alt="Match" class="w-10 h-10 object-cover rounded-lg border border-emerald-200 shrink-0" onerror="this.src='{{ $lead->matched_product_image }}'">
                                                @else
                                                    <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center text-sm">👜</div>
                                                @endif
                                                <div class="overflow-hidden space-y-0.5">
                                                    <div class="text-[11px] font-bold text-slate-900 truncate" title="{{ $lead->matched_product_title }}">
                                                        {{ $lead->matched_product_title }}
                                                    </div>
                                                    <div class="text-[10px] font-extrabold text-emerald-700">
                                                        {{ $lead->matched_price_formatted }}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-[11px] text-slate-400 italic">Belum dicocokkan</span>
                                        @endif
                                    </td>

                                    <!-- Status Pipeline -->
                                    <td class="py-4 px-4">
                                        <form method="POST" action="{{ route('leads.update', $lead) }}" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" 
                                                    class="py-1 px-2.5 text-[11px] font-bold rounded-lg border focus:outline-none transition {{ $sInfo['class'] }}">
                                                <option value="new" {{ $lead->status == 'new' ? 'selected' : '' }}>🔥 Prospek Baru</option>
                                                <option value="contacted" {{ $lead->status == 'contacted' ? 'selected' : '' }}>💬 Dihubungi</option>
                                                <option value="interested" {{ $lead->status == 'interested' ? 'selected' : '' }}>⏳ Tertarik</option>
                                                <option value="closed" {{ $lead->status == 'closed' ? 'selected' : '' }}>👑 Deal Pre-Order</option>
                                                <option value="lost" {{ $lead->status == 'lost' ? 'selected' : '' }}>❌ Batal</option>
                                            </select>
                                        </form>
                                    </td>

                                    <!-- Actions -->
                                    <td class="py-4 px-4 sm:px-6 text-right">
                                        <div class="flex items-center justify-end gap-1.5">
                                            
                                            <!-- Outreach Draft Modal Button -->
                                            <button onclick="openOutreachModal({{ json_encode($lead) }})" 
                                                    class="inline-flex items-center gap-1 bg-emerald-600 hover:bg-emerald-700 text-white px-2.5 py-1.5 rounded-lg text-xs font-bold transition shadow-sm"
                                                    title="Buka Template Pesan Pendekatan (Outreach)">
                                                <span>💬 Draf Chat</span>
                                            </button>

                                            <!-- Edit Lead -->
                                            <button onclick="openEditModal({{ json_encode($lead) }})" 
                                                    class="p-1.5 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition"
                                                    title="Edit Data Prospek">
                                                ✏️
                                            </button>

                                            <!-- Delete Lead -->
                                            <form method="POST" action="{{ route('leads.destroy', $lead) }}" onsubmit="return confirm('Hapus prospek {{ $lead->name }} dari CRM?')" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus Prospek">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center text-slate-400">
                                        <div class="text-4xl mb-3">🎯</div>
                                        <p class="font-semibold text-slate-600">Belum ada data prospek lead.</p>
                                        <p class="text-xs mt-1">Gunakan tombol <strong>⚡ AI Quick Matcher</strong> untuk mengubah komentar calon pembeli menjadi penjualan!</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($leads->hasPages())
                    <div class="p-4 border-t border-slate-100">
                        {{ $leads->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>

    <!-- ================= MODAL: AI QUICK LEAD MATCHER ================= -->
    <div id="aiMatcherModal" class="fixed inset-0 z-50 hidden bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-slate-100 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-6">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-lg">⚡</span>
                        <h3 class="font-serif font-bold text-xl text-slate-900">AI Quick Lead Matcher</h3>
                    </div>
                    <p class="text-xs text-slate-500 mt-1">Paste komentar / tweet pencarian barang calon pembeli. AI otomatis mencocokkan ke 1.879+ katalog Kamelia Store!</p>
                </div>
                <button onclick="closeAiMatcherModal()" class="text-slate-400 hover:text-slate-700 text-lg font-bold">✕</button>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Komentar / Tweet / Permintaan Calon Pembeli:
                    </label>
                    <textarea id="aiRawInput" rows="3" 
                              class="w-full text-xs p-3.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 bg-slate-50/50"
                              placeholder="Contoh: 'Kak @clarissa_bags WTB Coach Rowan Satchel warna hitam / coklat budget under 1.8jt dong yang like new DM ya'"></textarea>
                </div>

                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold text-slate-500">Asal Platform:</span>
                        <select id="aiPlatform" class="text-xs py-1.5 px-2.5 rounded-lg border border-slate-200 bg-white">
                            <option value="instagram">📸 Instagram</option>
                            <option value="twitter">🐦 X (Twitter)</option>
                            <option value="carousell">🛍️ Carousell</option>
                            <option value="tiktok">🎵 TikTok</option>
                            <option value="facebook">👥 Facebook</option>
                            <option value="whatsapp">💬 WhatsApp</option>
                        </select>
                    </div>

                    <button type="button" onclick="runAiMatch()" id="aiMatchBtn" 
                            class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-bold text-xs px-5 py-2.5 rounded-xl shadow-md transition">
                        ⚡ Analisis & Cari Barang Cocok
                    </button>
                </div>

                <!-- Live Results Area -->
                <div id="aiResultsArea" class="hidden pt-4 border-t border-slate-100 space-y-4">
                    
                    <!-- Extracted Tags -->
                    <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200/80 flex flex-wrap items-center gap-2 text-xs">
                        <span class="text-[11px] font-bold text-slate-500">Hasil Deteksi AI:</span>
                        <span id="aiTagBrand" class="px-2 py-0.5 bg-slate-900 text-amber-300 rounded font-bold text-[10px]">-</span>
                        <span id="aiTagCategory" class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded font-bold text-[10px]">-</span>
                        <span id="aiTagBudget" class="px-2 py-0.5 bg-emerald-100 text-emerald-800 rounded font-bold text-[10px]">-</span>
                        <span id="aiTagHandle" class="px-2 py-0.5 bg-purple-100 text-purple-700 rounded font-bold text-[10px]">-</span>
                    </div>

                    <!-- Best Product Match Cards -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Rekomendasi Barang Terbaik dari Butik Kamelia Store:
                        </label>
                        <div id="aiProductCards" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <!-- Injected by JS -->
                        </div>
                    </div>

                    <!-- Outreach Draft Preview -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Draf Pesan Pendekatan Eksklusif (Outreach):
                        </label>
                        <textarea id="aiDraftOutput" rows="5" class="w-full text-xs p-3 rounded-xl border border-slate-200 bg-emerald-50/30 text-slate-800 font-sans"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <form method="POST" action="{{ route('leads.store') }}" id="saveLeadForm">
                        @csrf
                        <input type="hidden" name="name" id="formLeadName">
                        <input type="hidden" name="handle" id="formLeadHandle">
                        <input type="hidden" name="platform" id="formLeadPlatform">
                        <input type="hidden" name="target_brand" id="formLeadBrand">
                        <input type="hidden" name="target_category" id="formLeadCategory">
                        <input type="hidden" name="budget_max" id="formLeadBudget">
                        <input type="hidden" name="raw_inquiry" id="formLeadRaw">
                        <input type="hidden" name="matched_product_id" id="formLeadProdId">
                        <input type="hidden" name="matched_product_title" id="formLeadProdTitle">
                        <input type="hidden" name="matched_product_price" id="formLeadProdPrice">
                        <input type="hidden" name="matched_product_image" id="formLeadProdImage">
                        <input type="hidden" name="outreach_message" id="formLeadOutreach">
                        <input type="hidden" name="status" value="new">

                        <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs py-3.5 rounded-xl shadow-md transition flex items-center justify-center gap-2">
                            <span>💾 Simpan Prospek & Rekomendasi ke CRM</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- ================= MODAL: OUTREACH DRAFT VIEWER ================= -->
    <div id="outreachModal" class="fixed inset-0 z-50 hidden bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-xl w-full p-6 sm:p-8 shadow-2xl border border-slate-100 space-y-5">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="text-xl">💬</span>
                    <h3 class="font-serif font-bold text-lg text-slate-900" id="outreachModalTitle">Draf Chat Outreach</h3>
                </div>
                <button onclick="closeOutreachModal()" class="text-slate-400 hover:text-slate-700 text-lg font-bold">✕</button>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1.5">Teks Pesan Siap Kirim (Ramah, Personal & Non-Spam):</label>
                <textarea id="outreachModalText" rows="7" class="w-full text-xs p-3.5 rounded-xl border border-slate-200 bg-emerald-50/20 text-slate-800 font-sans leading-relaxed"></textarea>
            </div>

            <div class="flex items-center gap-3">
                <button type="button" onclick="copyOutreachText()" class="flex-1 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs py-3 rounded-xl transition flex items-center justify-center gap-1.5">
                    <span>📋 Salin Pesan</span>
                </button>
                <a id="outreachWaLink" href="#" target="_blank" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs py-3 rounded-xl transition flex items-center justify-center gap-1.5 text-decoration-none">
                    <span>💬 Buka WhatsApp</span>
                </a>
            </div>
        </div>
    </div>

    <!-- ================= MODAL: MANUAL CREATE / EDIT LEAD ================= -->
    <div id="manualModal" class="fixed inset-0 z-50 hidden bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-100 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-4">
                <h3 class="font-serif font-bold text-lg text-slate-900" id="manualModalTitle">Tambah Prospek Manual</h3>
                <button onclick="closeManualModal()" class="text-slate-400 hover:text-slate-700 text-lg font-bold">✕</button>
            </div>

            <form method="POST" id="manualForm" action="{{ route('leads.store') }}" class="space-y-3.5 text-xs">
                @csrf
                <div id="manualMethodSpoof"></div>

                <div>
                    <label class="block font-bold text-slate-700 mb-1">Nama Calon Pembeli *</label>
                    <input type="text" name="name" id="manualName" required class="w-full p-2.5 rounded-xl border border-slate-200 text-xs">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Username / @Handle</label>
                        <input type="text" name="handle" id="manualHandle" placeholder="@clarissa" class="w-full p-2.5 rounded-xl border border-slate-200 text-xs">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Platform Asal *</label>
                        <select name="platform" id="manualPlatform" class="w-full p-2.5 rounded-xl border border-slate-200 text-xs bg-white">
                            <option value="instagram">📸 Instagram</option>
                            <option value="twitter">🐦 X (Twitter)</option>
                            <option value="carousell">🛍️ Carousell</option>
                            <option value="tiktok">🎵 TikTok</option>
                            <option value="facebook">👥 Facebook</option>
                            <option value="whatsapp">💬 WhatsApp</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Brand Dicari</label>
                        <input type="text" name="target_brand" id="manualBrand" placeholder="Coach, Tory Burch..." class="w-full p-2.5 rounded-xl border border-slate-200 text-xs">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Budget Maksimal (Rp)</label>
                        <input type="number" name="budget_max" id="manualBudget" placeholder="2000000" class="w-full p-2.5 rounded-xl border border-slate-200 text-xs">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 mb-1">No. WhatsApp / Kontak</label>
                    <input type="text" name="contact" id="manualContact" placeholder="08123456789 / link DM" class="w-full p-2.5 rounded-xl border border-slate-200 text-xs">
                </div>

                <div>
                    <label class="block font-bold text-slate-700 mb-1">Catatan / Catatan Permintaan</label>
                    <textarea name="raw_inquiry" id="manualInquiry" rows="2" placeholder="Detail warna, tipe tas, atau kondisi..." class="w-full p-2.5 rounded-xl border border-slate-200 text-xs"></textarea>
                </div>

                <div class="pt-2 flex items-center justify-end gap-2">
                    <button type="button" onclick="closeManualModal()" class="px-4 py-2 bg-slate-100 text-slate-600 font-bold rounded-xl">Batal</button>
                    <button type="submit" class="px-5 py-2 bg-slate-900 text-white font-bold rounded-xl">Simpan Prospek</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        let selectedProductForLead = null;

        function openAiMatcherModal() {
            document.getElementById('aiMatcherModal').classList.remove('hidden');
        }

        function closeAiMatcherModal() {
            document.getElementById('aiMatcherModal').classList.add('hidden');
        }

        async function runAiMatch() {
            const rawText = document.getElementById('aiRawInput').value.trim();
            const platform = document.getElementById('aiPlatform').value;
            const btn = document.getElementById('aiMatchBtn');

            if (!rawText) {
                alert("Mohon masukkan teks komentar/tweet calon pembeli terlebih dahulu!");
                return;
            }

            btn.disabled = true;
            btn.innerHTML = "⏳ Menganalisis & Mencocokkan...";

            try {
                const response = await fetch("{{ route('leads.quick-match') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ text: rawText, platform: platform })
                });

                const data = await response.json();
                btn.disabled = false;
                btn.innerHTML = "⚡ Analisis & Cari Barang Cocok";

                if (!data.success) {
                    alert(data.message || "Gagal mencocokkan produk.");
                    return;
                }

                // Render tags
                document.getElementById('aiTagBrand').innerText = data.extracted.brand || 'Luxury';
                document.getElementById('aiTagCategory').innerText = data.extracted.category || 'Tas';
                document.getElementById('aiTagBudget').innerText = data.extracted.budget_formatted || 'Budget Fleksibel';
                document.getElementById('aiTagHandle').innerText = data.extracted.handle || '@user';

                // Populate Form Fields
                document.getElementById('formLeadName').value = data.extracted.handle || 'Calon Pembeli';
                document.getElementById('formLeadHandle').value = data.extracted.handle || '';
                document.getElementById('formLeadPlatform').value = platform;
                document.getElementById('formLeadBrand').value = data.extracted.brand || '';
                document.getElementById('formLeadCategory').value = data.extracted.category || 'Tas';
                document.getElementById('formLeadBudget').value = data.extracted.budget || '';
                document.getElementById('formLeadRaw').value = rawText;
                document.getElementById('aiDraftOutput').value = data.outreach_draft;
                document.getElementById('formLeadOutreach').value = data.outreach_draft;

                // Render matching cards
                const cardsContainer = document.getElementById('aiProductCards');
                if (data.matches && data.matches.length > 0) {
                    selectedProductForLead = data.matches[0];
                    setFormMatchedProduct(selectedProductForLead);

                    cardsContainer.innerHTML = data.matches.map((p, idx) => `
                        <div onclick="selectProductMatch(${JSON.stringify(p).replace(/"/g, '&quot;')}, this)" 
                             class="p-3 rounded-xl border ${idx === 0 ? 'border-emerald-500 bg-emerald-50/40 ring-2 ring-emerald-500/20' : 'border-slate-200 bg-white'} cursor-pointer hover:border-emerald-400 transition flex gap-2.5 items-center prod-match-card">
                            <img src="${p.image_local || p.image_url_remote}" alt="${p.title}" class="w-12 h-12 rounded-lg object-cover border border-slate-200 shrink-0" onerror="this.src='${p.image_url_remote}'">
                            <div class="overflow-hidden">
                                <span class="text-[9px] font-extrabold px-1.5 py-0.5 bg-slate-900 text-amber-300 rounded">${p.brand}</span>
                                <h5 class="text-[11px] font-bold text-slate-900 truncate mt-0.5">${p.title}</h5>
                                <div class="text-[11px] font-extrabold text-emerald-700">${p.selling_idr_formatted}</div>
                            </div>
                        </div>
                    `).join('');
                } else {
                    cardsContainer.innerHTML = `<div class="col-span-2 text-center text-xs text-slate-400 p-4">Tidak ada kecocokan spesifik di katalog.</div>`;
                }

                document.getElementById('aiResultsArea').classList.remove('hidden');

            } catch (err) {
                btn.disabled = false;
                btn.innerHTML = "⚡ Analisis & Cari Barang Cocok";
                alert("Terjadi kesalahan sistem: " + err.message);
            }
        }

        function selectProductMatch(prod, el) {
            selectedProductForLead = prod;
            setFormMatchedProduct(prod);

            document.querySelectorAll('.prod-match-card').forEach(c => {
                c.classList.remove('border-emerald-500', 'bg-emerald-50/40', 'ring-2', 'ring-emerald-500/20');
                c.classList.add('border-slate-200', 'bg-white');
            });
            el.classList.add('border-emerald-500', 'bg-emerald-50/40', 'ring-2', 'ring-emerald-500/20');
        }

        function setFormMatchedProduct(p) {
            document.getElementById('formLeadProdId').value = p.id;
            document.getElementById('formLeadProdTitle').value = p.title;
            document.getElementById('formLeadProdPrice').value = p.selling_idr;
            document.getElementById('formLeadProdImage').value = p.image_local || p.image_url_remote;
        }

        function openOutreachModal(lead) {
            document.getElementById('outreachModalTitle').innerText = `Draf Chat untuk ${lead.name} (${lead.target_brand || 'Luxury'})`;
            document.getElementById('outreachModalText').value = lead.outreach_message || `Halo kak ${lead.name}, salam kenal dari Kamelia Store Concierge ✨`;
            
            const waBtn = document.getElementById('outreachWaLink');
            const cleanDigits = lead.contact ? lead.contact.replace(/[^0-9]/g, '') : '';
            const msgEncoded = encodeURIComponent(lead.outreach_message || '');
            
            if (cleanDigits && cleanDigits.length >= 9) {
                let formattedPhone = cleanDigits;
                if (formattedPhone.startsWith('0')) formattedPhone = '62' + formattedPhone.slice(1);
                waBtn.href = `https://wa.me/${formattedPhone}?text=${msgEncoded}`;
                waBtn.innerHTML = `<span>💬 Chat WhatsApp (${formattedPhone})</span>`;
            } else if (lead.handle) {
                const h = lead.handle.replace('@', '');
                let profileUrl = `https://x.com/${h}`;
                if (lead.platform === 'instagram') profileUrl = `https://instagram.com/${h}`;
                else if (lead.platform === 'carousell') profileUrl = `https://www.carousell.co.id/u/${h}`;
                else if (lead.platform === 'tiktok') profileUrl = `https://www.tiktok.com/@${h}`;
                
                waBtn.href = profileUrl;
                waBtn.innerHTML = `<span>📩 Buka Profil & Kirim DM (@${h})</span>`;
            } else {
                waBtn.href = `https://wa.me/?text=${msgEncoded}`;
                waBtn.innerHTML = `<span>💬 Salin & Bagikan Chat</span>`;
            }

            document.getElementById('outreachModal').classList.remove('hidden');
        }

        function closeOutreachModal() {
            document.getElementById('outreachModal').classList.add('hidden');
        }

        function copyOutreachText() {
            const copyText = document.getElementById("outreachModalText");
            copyText.select();
            navigator.clipboard.writeText(copyText.value);
            alert("✓ Teks pesan berhasil disalin ke clipboard!");
        }

        function openCreateModal() {
            document.getElementById('manualModalTitle').innerText = "Tambah Prospek Manual";
            document.getElementById('manualForm').action = "{{ route('leads.store') }}";
            document.getElementById('manualMethodSpoof').innerHTML = '';
            document.getElementById('manualName').value = '';
            document.getElementById('manualHandle').value = '';
            document.getElementById('manualBrand').value = '';
            document.getElementById('manualBudget').value = '';
            document.getElementById('manualContact').value = '';
            document.getElementById('manualInquiry').value = '';
            document.getElementById('manualModal').classList.remove('hidden');
        }

        function openEditModal(lead) {
            document.getElementById('manualModalTitle').innerText = "Edit Data Prospek";
            document.getElementById('manualForm').action = `/leads/${lead.id}`;
            document.getElementById('manualMethodSpoof').innerHTML = '@method("PATCH")';
            document.getElementById('manualName').value = lead.name;
            document.getElementById('manualHandle').value = lead.handle || '';
            document.getElementById('manualPlatform').value = lead.platform;
            document.getElementById('manualBrand').value = lead.target_brand || '';
            document.getElementById('manualBudget').value = lead.budget_max || '';
            document.getElementById('manualContact').value = lead.contact || '';
            document.getElementById('manualInquiry').value = lead.raw_inquiry || '';
            document.getElementById('manualModal').classList.remove('hidden');
        }

        function closeManualModal() {
            document.getElementById('manualModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
