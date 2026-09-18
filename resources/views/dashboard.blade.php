<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-serif font-bold text-2xl text-gray-900 leading-tight">
                    {{ __('Dashboard Akun') }}
                </h2>
                <p class="text-xs text-gray-500 mt-1 font-sans">
                    Pusat kendali akun dan layanan eksklusif Kamelia Store
                </p>
            </div>
            <div>
                @if(Auth::user()->isAdmin())
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-900 border border-amber-300 shadow-xs">
                        👑 Administrator (Owner)
                    </span>
                @elseif(Auth::user()->isStaff())
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-900 border border-emerald-300 shadow-xs">
                        💬 Staff / Concierge
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-indigo-100 text-indigo-900 border border-indigo-300 shadow-xs">
                        🌟 Member VIP / Customer
                    </span>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        
        <!-- Welcome Banner -->
        <div class="relative overflow-hidden bg-gradient-to-r from-[#0A261F] via-[#113B2E] to-[#164D3D] rounded-2xl p-6 sm:p-8 text-white shadow-xl border border-[#C9A24D]/30">
            <div class="relative z-10 max-w-3xl">
                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-md bg-white/10 backdrop-blur-sm border border-white/10 text-amber-300 text-xs font-bold uppercase tracking-widest mb-3 font-mono">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-ping"></span>
                    Kamelia Store Sovereign System
                </div>
                <h3 class="text-2xl sm:text-3xl font-serif font-bold tracking-wide">
                    Selamat Datang, {{ Auth::user()->name }}!
                </h3>
                <p class="mt-2 text-sm text-gray-200 opacity-90 leading-relaxed font-sans">
                    Anda saat ini masuk sebagai <strong class="text-amber-300 underline underline-offset-2">{{ Auth::user()->role_label }}</strong>. Akses seluruh fitur dan layanan eksklusif di bawah ini sesuai hak akses peran Anda.
                </p>
            </div>
            
            <!-- Background Decorative Badge -->
            <div class="absolute right-4 -bottom-6 font-serif font-bold text-9xl text-white/5 select-none pointer-events-none">
                KS
            </div>
        </div>

        <!-- Role-Specific Action Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card 1: Katalog Toko -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xl mb-4 group-hover:scale-110 transition">
                    👜
                </div>
                <h4 class="font-bold text-gray-900 text-base font-serif">Katalog Pre-Order</h4>
                <p class="text-xs text-gray-500 mt-1 mb-4 leading-relaxed font-sans">
                    Jelajahi 900+ koleksi tas, dompet, jam tangan, dan sabuk branded original.
                </p>
                <a href="{{ url('/katalog') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-800 hover:text-emerald-900 uppercase tracking-wider">
                    <span>Buka Katalog</span>
                    <span class="group-hover:translate-x-1 transition">&rarr;</span>
                </a>
            </div>

            <!-- Card 2: Layanan / Fitur Sesuai Role -->
            @if(Auth::user()->isAdmin())
                <div class="bg-white p-6 rounded-2xl border border-amber-100 shadow-sm hover:shadow-md transition group">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xl mb-4 group-hover:scale-110 transition">
                        👥
                    </div>
                    <h4 class="font-bold text-gray-900 text-base font-serif">Pengaturan User & Role</h4>
                    <p class="text-xs text-gray-500 mt-1 mb-4 leading-relaxed font-sans">
                        Kelola akun pengguna, tambah staf, dan tetapkan hak akses peran sistem.
                    </p>
                    <a href="{{ route('users.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-800 hover:text-amber-900 uppercase tracking-wider">
                        <span>Kelola Pengguna</span>
                        <span class="group-hover:translate-x-1 transition">&rarr;</span>
                    </a>
                </div>
            @elseif(Auth::user()->isStaff())
                <div class="bg-white p-6 rounded-2xl border border-emerald-100 shadow-sm hover:shadow-md transition group">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xl mb-4 group-hover:scale-110 transition">
                        💬
                    </div>
                    <h4 class="font-bold text-gray-900 text-base font-serif">Layanan Concierge</h4>
                    <p class="text-xs text-gray-500 mt-1 mb-4 leading-relaxed font-sans">
                        Bantu pelanggan mengecek status ketersediaan barang dan proses pesanan pre-order.
                    </p>
                    <a href="{{ url('/katalog') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-800 hover:text-emerald-900 uppercase tracking-wider">
                        <span>Cek Katalog PO</span>
                        <span class="group-hover:translate-x-1 transition">&rarr;</span>
                    </a>
                </div>
            @else
                <div class="bg-white p-6 rounded-2xl border border-indigo-100 shadow-sm hover:shadow-md transition group">
                    <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center font-bold text-xl mb-4 group-hover:scale-110 transition">
                        💎
                    </div>
                    <h4 class="font-bold text-gray-900 text-base font-serif">Benefit Member VIP</h4>
                    <p class="text-xs text-gray-500 mt-1 mb-4 leading-relaxed font-sans">
                        Dapatkan prioritas konsultasi concierge WhatsApp dan garansi keaslian 100%.
                    </p>
                    <a href="{{ url('/katalog') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-800 hover:text-indigo-900 uppercase tracking-wider">
                        <span>Lihat Koleksi</span>
                        <span class="group-hover:translate-x-1 transition">&rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Card 3: Pengaturan Profil -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-xl bg-gray-50 text-gray-700 flex items-center justify-center font-bold text-xl mb-4 group-hover:scale-110 transition">
                    👤
                </div>
                <h4 class="font-bold text-gray-900 text-base font-serif">Pengaturan Akun</h4>
                <p class="text-xs text-gray-500 mt-1 mb-4 leading-relaxed font-sans">
                    Perbarui nama, alamat email terdaftar, dan ganti kata sandi login Anda.
                </p>
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-gray-800 hover:text-black uppercase tracking-wider">
                    <span>Edit Profil</span>
                    <span class="group-hover:translate-x-1 transition">&rarr;</span>
                </a>
            </div>

        </div>

    </div>
</x-app-layout>
