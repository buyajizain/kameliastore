<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kamelia Store') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.loadNpmTasks:n.queue.push(arguments)};
            if(!f._q)return;n.push(1000);;n.loaded=!0;n.version='2.0';
            n.queue=[];script=document.createElement('script');
            script.async=!0;script.src=v;s=document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(script,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '695641838885394');
            fbq('track', 'PageView');
            </script>
            <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=695641838885394&ev=PageView&noscript=1"
            /></noscript>
            <!-- End Meta Pixel Code -->
    </head>
    <body class="font-sans antialiased h-full text-gray-900 bg-gray-50" x-data="{ sidebarOpen: false }">
        <div class="min-h-screen flex">
            
            <!-- Sidebar Navigation -->
            @include('layouts.sidebar')

            <!-- Main Content Area Wrapper -->
            <div class="flex-1 min-w-0 flex flex-col md:pl-72 transition-all duration-300">
                
                <!-- Topbar Header -->
                <header class="sticky top-0 z-30 bg-white/95 backdrop-blur-sm border-b border-gray-100 shadow-sm">
                    <div class="flex items-center justify-between h-14 sm:h-16 px-3 sm:px-6 lg:px-8">
                        
                        <!-- Left: Mobile Menu Button & Breadcrumb -->
                        <div class="flex items-center gap-3">
                            <button @click="sidebarOpen = true" 
                                    class="md:hidden p-2 rounded-xl text-gray-600 hover:text-emerald-900 hover:bg-emerald-50 transition focus:outline-none"
                                    title="Buka Menu Sidebar">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </button>

                            <div class="hidden sm:flex items-center gap-2 text-xs text-gray-500 font-medium">
                                <a href="{{ route('dashboard') }}" class="hover:text-emerald-800">Kamelia Portal</a>
                                <span>/</span>
                                <span class="text-emerald-900 font-bold">
                                    @if(request()->routeIs('dashboard'))
                                        Dashboard
                                    @elseif(request()->routeIs('profile.edit'))
                                        Profil Akun
                                    @else
                                        {{ config('app.name', 'Kamelia Store') }}
                                    @endif
                                </span>
                            </div>
                        </div>

                        <!-- Right: Actions & User Quick Profile -->
                        <div class="flex items-center gap-3">
                            
                            <!-- WhatsApp CS Link -->
                            <a href="https://wa.me/6281234567890?text=Halo%20Personal%20Concierge%20Kamelia%20Store" 
                               target="_blank"
                               class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200 hover:bg-emerald-100 transition">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>Concierge CS</span>
                            </a>

                            <!-- Katalog Button -->
                            <a href="{{ url('/katalog') }}" 
                               class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg text-xs font-bold bg-[#0A261F] text-[#C9A24D] hover:bg-[#14493D] transition shadow-sm">
                                <span>👜 Katalog (1.500+)</span>
                            </a>

                            <!-- User Profile Dropdown -->
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center gap-2 p-1.5 rounded-xl hover:bg-gray-100 transition text-sm">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-800 text-[#C9A24D] flex items-center justify-center font-bold text-xs font-serif shadow-sm">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                        </div>
                                        <span class="hidden md:block font-bold text-xs text-gray-700 max-w-[120px] truncate">
                                            {{ Auth::user()->name }}
                                        </span>
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="px-4 py-2 border-b border-gray-100">
                                        <div class="font-bold text-xs text-gray-900 truncate">{{ Auth::user()->name }}</div>
                                        <div class="text-[11px] text-gray-500 truncate">{{ Auth::user()->email }}</div>
                                    </div>

                                    <x-dropdown-link :href="route('profile.edit')">
                                        👤 {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="/katalog">
                                        👜 {{ __('Katalog Pre-Order') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="/">
                                        🌐 {{ __('Website Utama') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                                class="text-rose-600 hover:bg-rose-50 hover:text-rose-700">
                                            🚪 {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>

                        </div>

                    </div>
                </header>

                <!-- Page Header (if defined) -->
                @isset($header)
                    <div class="bg-white border-b border-gray-100 px-4 sm:px-6 lg:px-8 py-4 shadow-xs">
                        <div class="font-serif">
                            {{ $header }}
                        </div>
                    </div>
                @endisset

                <!-- Main Content Body -->
                <main class="flex-1 p-3.5 sm:p-6 lg:p-8">
                    {{ $slot }}
                </main>

                <!-- Footer -->
                <footer class="bg-white border-t border-gray-100 py-4 px-6 text-center text-xs text-gray-400">
                    &copy; {{ date('Y') }} Kamelia Store &bull; Authentic Luxury Pre-Order Portal
                </footer>

            </div>

        </div>
    </body>
</html>
