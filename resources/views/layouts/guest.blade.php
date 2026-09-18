<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kamelia Store') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .geometric-pattern {
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a24d' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50">
        <div class="min-h-screen flex flex-col md:flex-row md:items-stretch">
            
            <!-- Mobile Header Bar -->
            <div class="md:hidden w-full bg-[#0A261F] px-4 py-3.5 flex justify-between items-center shadow-md border-b border-[#C9A24D]/20">
                <a href="/" class="flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 bg-white/10 text-[#C9A24D] rounded-lg font-serif font-bold text-sm border border-[#C9A24D]/30">
                        KS
                    </div>
                    <span class="font-bold text-sm tracking-wider text-white uppercase">
                        Kamelia <span class="text-[#C9A24D]">Store</span>
                    </span>
                </a>
                <a href="/" class="text-xs text-emerald-300 font-semibold hover:text-white">
                    &larr; Beranda
                </a>
            </div>

            <!-- Left Side (Luxury Brand Banner) - Visible on Desktop -->
            <div class="hidden md:flex md:w-1/2 lg:w-3/5 bg-[#0A261F] relative items-center justify-center p-8 lg:p-12 overflow-hidden">
                <!-- Subtle pattern overlay -->
                <div class="absolute inset-0 opacity-[0.03]" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-rule='evenodd'%3E%3Cpath d='M20 0L40 20L20 40L0 20z' fill-opacity='1'/%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
                
                <div class="z-10 text-center max-w-md">
                    <!-- Logo -->
                    <div class="flex justify-center mb-8">
                        <div class="flex items-center justify-center w-20 h-20 bg-[#C9A24D] text-[#0A261F] rounded-2xl font-serif font-bold text-4xl shadow-2xl shadow-black/30">
                            KS
                        </div>
                    </div>

                    <!-- Brand Name -->
                    <h1 class="text-3xl lg:text-4xl font-serif font-bold text-white mb-2 tracking-wide">
                        KAMELIA STORE
                    </h1>
                    <div class="flex items-center justify-center gap-3 mb-10">
                        <div class="w-8 h-px bg-[#C9A24D]"></div>
                        <p class="text-[#C9A24D] text-xs tracking-[0.2em] uppercase font-semibold">
                            Luxury Boutique
                        </p>
                        <div class="w-8 h-px bg-[#C9A24D]"></div>
                    </div>
                    
                    <!-- Feature Cards -->
                    <div class="space-y-3 text-left max-w-sm mx-auto">
                        <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-[#C9A24D] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#0A261F]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-white">100% Authentic</h3>
                                <p class="text-xs text-white/60 mt-0.5">Jaminan keaslian produk original</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-[#C9A24D] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#0A261F]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-white">Physical QC</h3>
                                <p class="text-xs text-white/60 mt-0.5">Pengecekan kualitas fisik ketat</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-[#C9A24D] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#0A261F]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-white">Secured Transaction</h3>
                                <p class="text-xs text-white/60 mt-0.5">Transaksi aman dan bergaransi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side (Auth Form Container) -->
            <div class="w-full md:w-1/2 lg:w-2/5 flex-1 bg-white flex flex-col justify-between items-center p-5 sm:p-8 lg:p-12 min-h-[calc(100vh-60px)] md:min-h-screen">
                
                <!-- Desktop Logo -->
                <div class="hidden md:flex mb-6">
                    <a href="/" class="flex items-center gap-2">
                        <div class="flex items-center justify-center w-10 h-10 bg-[#0A261F] text-[#C9A24D] rounded-xl font-serif font-bold text-xl">
                            KS
                        </div>
                        <span class="font-bold tracking-wider text-gray-900 uppercase text-lg">
                            Kamelia <span class="text-emerald-800">Store</span>
                        </span>
                    </a>
                </div>

                <!-- Form Content -->
                <div class="w-full max-w-sm my-auto">
                    {{ $slot }}
                </div>
                
                <!-- Bottom Copyright -->
                <div class="mt-8 text-center text-xs text-gray-400">
                    &copy; {{ date('Y') }} Kamelia Store. All rights reserved.
                </div>
            </div>

        </div>
    </body>
</html>
