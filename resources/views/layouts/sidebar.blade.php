<!-- Mobile Backdrop -->
<div x-show="sidebarOpen" 
     x-transition:enter="transition-opacity ease-linear duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-40 md:hidden"
     @click="sidebarOpen = false"
     style="display: none;"></div>

<!-- Sidebar Container -->
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed top-0 left-0 bottom-0 z-50 w-72 bg-gradient-to-b from-[#0A261F] via-[#0D3027] to-[#071B16] text-white flex flex-col transition-transform duration-300 ease-in-out md:translate-x-0 shadow-2xl border-r border-[#C9A24D]/20">
    
    <!-- Sidebar Header / Logo -->
    <div class="h-20 flex items-center justify-between px-6 border-b border-[#C9A24D]/15 bg-black/10">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
            <div class="flex items-center justify-center w-10 h-10 bg-white/10 backdrop-blur-sm text-[#C9A24D] rounded-xl font-serif font-bold text-xl border border-[#C9A24D]/40 shadow-inner group-hover:scale-105 transition">
                KS
            </div>
            <div>
                <div class="font-serif font-bold tracking-wider text-base text-white leading-tight">
                    KAMELIA <span class="text-[#C9A24D]">STORE</span>
                </div>
                <div class="text-[10px] text-emerald-300/80 tracking-widest uppercase font-semibold">
                    Portal Berdaulat
                </div>
            </div>
        </a>

        <!-- Mobile Close Button -->
        <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white p-1.5 rounded-lg hover:bg-white/10 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- User Profile Card -->
    <div class="p-4 mx-4 mt-4 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-[#C9A24D]/20 border border-[#C9A24D]/40 flex items-center justify-center font-bold text-sm text-[#C9A24D] font-serif shadow-inner">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="flex-1 min-w-0">
                <div class="font-bold text-sm text-white truncate">{{ Auth::user()->name }}</div>
                <div class="text-xs text-gray-300 truncate">{{ Auth::user()->email }}</div>
            </div>
        </div>
        <div class="mt-3 pt-2.5 border-t border-white/10 flex items-center justify-between text-xs">
            <span class="text-gray-400 text-[11px]">Role Sistem:</span>
            @if(Auth::user()->isAdmin())
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-amber-500/20 text-amber-300 border border-amber-500/40">
                    👑 Admin Owner
                </span>
            @elseif(Auth::user()->isStaff())
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                    💬 Staff Concierge
                </span>
            @else
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                    🌟 Member VIP
                </span>
            @endif
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
        
        <!-- Menu Utama -->
        <div>
            <div class="px-3 mb-2 text-[11px] font-bold uppercase tracking-wider text-emerald-400/70 font-mono">
                Menu Utama
            </div>
            <div class="space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-[#C9A24D] text-[#0A261F] font-bold shadow-lg shadow-[#C9A24D]/20' : 'text-gray-200 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-[#0A261F]' : 'text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span>Dashboard Akun</span>
                </a>

                <!-- Katalog Toko -->
                <a href="{{ url('/katalog') }}" 
                   class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->is('katalog') ? 'bg-[#C9A24D] text-[#0A261F] font-bold shadow-lg shadow-[#C9A24D]/20' : 'text-gray-200 hover:bg-white/10 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 {{ request()->is('katalog') ? 'text-[#0A261F]' : 'text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        <span>Katalog Pre-Order</span>
                    </div>
                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-full {{ request()->is('katalog') ? 'bg-[#0A261F] text-amber-300' : 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' }}">
                        1.500+
                    </span>
                </a>

                <!-- Website Utama -->
                <a href="{{ url('/') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-200 hover:bg-white/10 hover:text-white transition">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Beranda Toko</span>
                </a>
            </div>
        </div>

        <!-- Fitur Role Sesuai Akses -->
        <div>
            <div class="px-3 mb-2 text-[11px] font-bold uppercase tracking-wider text-emerald-400/70 font-mono">
                Akses & Layanan
            </div>
            <div class="space-y-1">
                @if(Auth::user()->isAdmin() || Auth::user()->isStaff())
                    <!-- CRM Leads & Matchmaker -->
                    <a href="{{ route('leads.index') }}" 
                       class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('leads.*') ? 'bg-[#C9A24D] text-[#0A261F] font-bold shadow-lg shadow-[#C9A24D]/20' : 'text-amber-200 hover:bg-amber-500/10 hover:text-amber-100' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">⚡</span>
                            <span>CRM Leads Prospek</span>
                        </div>
                        <span class="px-1.5 py-0.5 text-[9px] font-black rounded-md bg-amber-400/30 text-amber-300 border border-amber-400/40">
                            HOT 🔥
                        </span>
                    </a>
                @endif

                @if(Auth::user()->isAdmin())
                    <a href="{{ route('users.index') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('users.*') ? 'bg-[#C9A24D] text-[#0A261F] font-bold shadow-lg shadow-[#C9A24D]/20' : 'text-amber-200 hover:bg-amber-500/10 hover:text-amber-100' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('users.*') ? 'text-[#0A261F]' : 'text-amber-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <span>Pengaturan User</span>
                    </a>
                    <a href="{{ url('/katalog') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-amber-200 hover:bg-amber-500/10 hover:text-amber-100 transition">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                        <span>Mode Admin & Harga</span>
                    </a>
                @elseif(Auth::user()->isStaff())
                    <a href="https://wa.me/6281234567890?text=Halo%20Staff%20Kamelia%20Store" target="_blank"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-emerald-200 hover:bg-emerald-500/10 hover:text-emerald-100 transition">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span>Concierge CS</span>
                    </a>
                @else
                    <a href="{{ url('/katalog') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-indigo-200 hover:bg-indigo-500/10 hover:text-indigo-100 transition">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                        <span>Benefit Member VIP</span>
                    </a>
                @endif
            </div>
        </div>

        <!-- Pengaturan Akun -->
        <div>
            <div class="px-3 mb-2 text-[11px] font-bold uppercase tracking-wider text-emerald-400/70 font-mono">
                Pengaturan
            </div>
            <div class="space-y-1">
                <!-- Profile -->
                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('profile.edit') ? 'bg-[#C9A24D] text-[#0A261F] font-bold shadow-lg shadow-[#C9A24D]/20' : 'text-gray-200 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('profile.edit') ? 'text-[#0A261F]' : 'text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Pengaturan Akun</span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-rose-300 hover:bg-rose-500/10 hover:text-rose-200 transition text-left">
                        <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Keluar (Logout)</span>
                    </button>
                </form>
            </div>
        </div>

    </nav>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-[#C9A24D]/15 bg-black/20 text-center text-[11px] text-emerald-300/60 font-sans">
        &copy; {{ date('Y') }} Kamelia Store &bull; Sovereign
    </div>

</aside>
