@php
    $featuredProducts = $featuredProducts ?? [];
    $totalProducts = $totalProducts ?? 1500;
@endphp
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kamelia Store | Butik Pre-Order Tas & Jam Mewah 100% Original</title>
    <meta name="description" content="Butik Pre-Order tas, dompet, dan jam tangan mewah 100% original. Koleksi Coach, Tory Burch, Kate Spade, Prada, Michael Kors langsung dari butik resmi USA & Eropa. Garansi uang kembali.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,400;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        html, body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            overflow-x: hidden; 
            max-width: 100vw;
        }
        h1, h2, h3, .font-serif-luxury { font-family: 'Playfair Display', serif; }
        
        .luxury-gradient {
            background: linear-gradient(135deg, #061A15 0%, #0A261F 50%, #0F382E 100%);
        }
        .gold-shimmer {
            background: linear-gradient(90deg, #C9A24D 0%, #F5E5C9 50%, #C9A24D 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        @keyframes pulse-shadow {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.6); }
            70% { box-shadow: 0 0 0 12px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }
        .wa-pulse {
            animation: pulse-shadow 2.2s infinite;
        }
    </style>

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '695641838885394');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=695641838885394&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body class="antialiased bg-[#FAF8F5] text-gray-900" x-data="{ mobileMenu: false }">

    <!-- 1. TOP ANNOUNCEMENT BAR -->
    <aside class="bg-[#051410] text-[#E8D8B0] text-xs py-2 px-4 border-b border-emerald-900/40 relative z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-center sm:justify-between text-center sm:text-left">
            <div class="flex items-center gap-2 font-medium tracking-wide text-[11px] sm:text-xs">
                <span class="inline-flex items-center justify-center w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#C9A24D] text-[#0A261F] text-[9px] sm:text-[10px] font-bold">✓</span>
                <span class="sm:hidden">Pre-Order: <strong>100% Authentic</strong> & Free Ongkir</span>
                <span class="hidden sm:inline">Pre-Order Batch Eksklusif: <strong>100% Guaranteed Authentic</strong> & Free Ongkir Se-Indonesia</span>
            </div>
            <div class="hidden sm:flex items-center gap-4 text-[11px] font-semibold">
                <a href="https://wa.me/628997919274?text=Halo%20Admin%20Kamelia%20Store%2C%20saya%20tertarik%20tanya-tanya%20koleksi%20tas%20pre-order" target="_blank" onclick="if(typeof fbq==='function') fbq('track', 'Contact');" class="text-amber-300 hover:text-white transition flex items-center gap-1">
                    <span>Konsultasi WhatsApp: 0899-7919-274</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- 2. STICKY NAVBAR -->
    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-40 border-b border-gray-100 shadow-2xs transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14 sm:h-20 gap-2">
                
                <!-- Brand Logo (Left) -->
                <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0 group">
                    <div class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 bg-[#0A261F] text-[#C9A24D] rounded-lg sm:rounded-xl font-serif-luxury font-bold text-sm sm:text-lg shadow-xs group-hover:scale-105 transition duration-300">
                        KS
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif-luxury font-bold text-sm sm:text-xl tracking-wider text-gray-900 leading-none">
                            KAMELIA <span class="text-emerald-800">STORE</span>
                        </span>
                        <span class="text-[8px] sm:text-[9px] tracking-[0.18em] uppercase text-gray-400 font-semibold mt-0.5 sm:mt-1 leading-none">
                            Luxury Boutique
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links (Center - Clean, Spacious & Proportional) -->
                <div class="hidden lg:flex items-center gap-1 xl:gap-2">
                    <a href="{{ url('/katalog') }}" class="flex items-center gap-1.5 px-3.5 py-2 text-xs xl:text-sm font-semibold text-emerald-950 bg-emerald-50 hover:bg-emerald-100/80 border border-emerald-200/80 rounded-full transition shadow-2xs">
                        <span>👜 Katalog</span>
                        <span class="bg-emerald-800 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">1.500+</span>
                    </a>
                    <a href="#brands" class="px-3 py-2 text-xs xl:text-sm font-medium text-gray-700 hover:text-emerald-900 hover:bg-gray-50 rounded-lg transition">
                        Brands
                    </a>
                    <a href="#featured" class="px-3 py-2 text-xs xl:text-sm font-medium text-gray-700 hover:text-emerald-900 hover:bg-gray-50 rounded-lg transition">
                        Best Sellers
                    </a>
                    <a href="#how-it-works" class="px-3 py-2 text-xs xl:text-sm font-medium text-gray-700 hover:text-emerald-900 hover:bg-gray-50 rounded-lg transition">
                        Cara Order
                    </a>
                    <a href="#authenticity" class="px-3 py-2 text-xs xl:text-sm font-medium text-gray-700 hover:text-emerald-900 hover:bg-gray-50 rounded-lg transition">
                        Keaslian
                    </a>
                    <a href="#testimonials" class="px-3 py-2 text-xs xl:text-sm font-medium text-gray-700 hover:text-emerald-900 hover:bg-gray-50 rounded-lg transition">
                        Testimoni
                    </a>
                </div>

                <!-- Right Action Buttons (Right) -->
                <div class="flex items-center gap-1.5 sm:gap-3 shrink-0">
                    <!-- WhatsApp Concierge Pill (Desktop & Tablet) -->
                    <a href="https://wa.me/628997919274?text=Halo%20Admin%20Kamelia%20Store%2C%20saya%20ingin%20konsultasi%20tas%20pre-order" 
                       target="_blank" 
                       onclick="if(typeof fbq==='function') fbq('track', 'Contact');"
                       class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-2 bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-semibold rounded-full shadow-xs transition">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12.011 23.637c-3.132 0-6.105-1.226-8.381-3.454l-.442-.433-4.09 1.073 1.092-3.992-.387-.464c-2.454-2.935-3.803-6.61-3.803-10.367 0-9.117 7.439-16.516 16.582-16.516s16.582 7.399 16.582 16.516-7.439 16.516-16.582 16.516zm11.231-16.516c0-6.206-5.06-11.252-11.231-11.252-6.207 0-11.231 5.06-11.231 11.252 0 2.871 1.092 5.59 3.078 7.697l.63.673-.935 3.42 3.51-.92.68.665c2.14 2.083 4.966 3.228 7.96 3.228 6.207 0 11.231-5.06 11.231-11.252zm-12.723-5.228c-.146-.327-.301-.334-.441-.341-.115-.005-.248-.005-.381-.005-.133 0-.349.05-.532.249-.183.199-.698.68-.698 1.656 0 .975.714 1.916.814 2.049.099.133 1.376 2.217 3.407 3.033.483.195.86.311 1.155.405.485.151.926.13 1.275.078.388-.058 1.196-.488 1.362-.96.166-.472.166-.877.116-.96-.05-.083-.183-.133-.382-.233s-.382-.233-.532-.349c-.149-.116-.249-.166-.349-.1-.1.066-.2.166-.3.266s-.208.216-.301.327c-.092.112-.187.126-.386.026-.199-.099-.838-.309-1.595-.983-.591-.525-.99-1.173-1.106-1.372-.116-.199-.012-.307.087-.406.089-.089.199-.233.299-.349.099-.116.133-.199.199-.332.066-.133.033-.249-.017-.349s-.441-1.067-.611-1.485z" fill-rule="evenodd"/></svg>
                        <span class="hidden xl:inline">0899-7919-274</span>
                        <span class="xl:hidden">Chat WA</span>
                    </a>

                    <!-- Divider -->
                    <div class="hidden sm:block h-4 w-px bg-gray-200"></div>

                    <!-- Member Auth Link (Desktop & Tablet) -->
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="hidden sm:inline-flex px-3 py-1.5 text-xs font-semibold text-emerald-950 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                                Akun Saya
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="hidden sm:inline-flex px-3 py-1.5 text-xs font-semibold text-gray-700 hover:text-emerald-900 rounded-lg hover:bg-gray-100 transition">
                                Masuk
                            </a>
                        @endauth
                    @endif

                    <!-- Mobile Direct WA Icon (Clean & Compact) -->
                    <a href="https://wa.me/628997919274?text=Halo%20Admin%20Kamelia%20Store%2C%20saya%20ingin%20konsultasi%20tas%20pre-order" 
                       target="_blank" 
                       onclick="if(typeof fbq==='function') fbq('track', 'Contact');"
                       class="sm:hidden p-2 text-emerald-700 hover:bg-emerald-50 rounded-lg transition" 
                       aria-label="Chat WhatsApp">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.011 23.637c-3.132 0-6.105-1.226-8.381-3.454l-.442-.433-4.09 1.073 1.092-3.992-.387-.464c-2.454-2.935-3.803-6.61-3.803-10.367 0-9.117 7.439-16.516 16.582-16.516s16.582 7.399 16.582 16.516-7.439 16.516-16.582 16.516zm11.231-16.516c0-6.206-5.06-11.252-11.231-11.252-6.207 0-11.231 5.06-11.231 11.252 0 2.871 1.092 5.59 3.078 7.697l.63.673-.935 3.42 3.51-.92.68.665c2.14 2.083 4.966 3.228 7.96 3.228 6.207 0 11.231-5.06 11.231-11.252zm-12.723-5.228c-.146-.327-.301-.334-.441-.341-.115-.005-.248-.005-.381-.005-.133 0-.349.05-.532.249-.183.199-.698.68-.698 1.656 0 .975.714 1.916.814 2.049.099.133 1.376 2.217 3.407 3.033.483.195.86.311 1.155.405.485.151.926.13 1.275.078.388-.058 1.196-.488 1.362-.96.166-.472.166-.877.116-.96-.05-.083-.183-.133-.382-.233s-.382-.233-.532-.349c-.149-.116-.249-.166-.349-.1-.1.066-.2.166-.3.266s-.208.216-.301.327c-.092.112-.187.126-.386.026-.199-.099-.838-.309-1.595-.983-.591-.525-.99-1.173-1.106-1.372-.116-.199-.012-.307.087-.406.089-.089.199-.233.299-.349.099-.116.133-.199.199-.332.066-.133.033-.249-.017-.349s-.441-1.067-.611-1.485z" fill-rule="evenodd"/></svg>
                    </a>

                    <!-- Mobile Hamburger Button -->
                    <button @click="mobileMenu = !mobileMenu" 
                            class="lg:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100 transition focus:outline-none"
                            aria-label="Toggle navigation menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Drawer -->
        <div x-show="mobileMenu" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden border-t border-gray-100 bg-white shadow-xl px-5 py-5 space-y-2.5"
             style="display: none;">
            <a href="{{ url('/katalog') }}" @click="mobileMenu = false" class="flex items-center justify-between px-4 py-3 rounded-xl bg-emerald-50 text-emerald-900 font-bold text-sm">
                <span>👜 Buka Katalog Lengkap</span>
                <span class="bg-emerald-700 text-white text-xs px-2.5 py-0.5 rounded-full">1.500+ PO</span>
            </a>
            <a href="#brands" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl text-gray-700 font-medium text-sm hover:bg-gray-50">
                💎 Brands (Coach, Tory Burch, dll)
            </a>
            <a href="#featured" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl text-gray-700 font-medium text-sm hover:bg-gray-50">
                ✨ Best Sellers
            </a>
            <a href="#how-it-works" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl text-gray-700 font-medium text-sm hover:bg-gray-50">
                📋 Cara Order
            </a>
            <a href="#authenticity" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl text-gray-700 font-medium text-sm hover:bg-gray-50">
                🛡️ Jaminan Keaslian
            </a>
            <a href="#testimonials" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl text-gray-700 font-medium text-sm hover:bg-gray-50">
                ⭐ Testimoni
            </a>

            <!-- Mobile WhatsApp Direct Button -->
            <a href="https://wa.me/628997919274?text=Halo%20Admin%20Kamelia%20Store%2C%20saya%20ingin%20konsultasi%20tas%20pre-order" target="_blank" onclick="if(typeof fbq==='function') fbq('track', 'Contact');" class="flex items-center justify-center gap-2 w-full py-3 bg-emerald-700 text-white font-bold text-sm rounded-xl shadow-md">
                <span>💬 Chat WhatsApp (0899-7919-274)</span>
            </a>

            <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="w-full text-center py-2.5 rounded-xl bg-gray-100 text-emerald-900 font-bold text-sm">
                            👤 Dashboard Akun
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="w-1/2 text-center py-2 text-gray-700 font-semibold text-sm">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="w-1/2 text-center py-2 bg-[#0A261F] text-[#C9A24D] rounded-xl font-bold text-sm">
                            Daftar Member
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- 3. HERO SECTION -->
    <header class="relative luxury-gradient text-white py-12 sm:py-20 lg:py-28 overflow-hidden">
        <!-- Subtle luxury background pattern -->
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#C9A24D_1px,transparent_1px)] [background-size:24px_24px]"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Hero Left: Copywriting & CTAs -->
                <div class="lg:col-span-7" data-aos="fade-up" data-aos-duration="1000">
                    
                    <!-- Micro Badge -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-900/80 border border-emerald-700/50 text-[#C9A24D] text-xs font-bold uppercase tracking-wider mb-6">
                        <span>⚜️</span>
                        <span>Boutique Pre-Order Terpercaya Indonesia</span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-serif-luxury font-bold leading-[1.15] text-white">
                        Koleksi Tas & Jam Mewah <br class="hidden sm:block">
                        <span class="gold-shimmer italic font-normal">100% Original Authentic.</span>
                    </h1>

                    <!-- Compelling Subtitle -->
                    <p class="mt-6 text-base sm:text-lg text-emerald-100/90 leading-relaxed max-w-2xl">
                        Wujudkan tas impian Anda dari brand ternama dunia (Coach, Tory Burch, Kate Spade, Michael Kors, Prada) langsung dari butik resmi USA & Eropa. <strong>Lebih hemat hingga 50%</strong>, garansi keaslian seumur hidup, dan layanan Personal Shopper siap melayani Anda.
                    </p>

                    <!-- Dual CTAs -->
                    <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row gap-4">
                        <a href="{{ url('/katalog') }}" class="inline-flex justify-center items-center gap-3 px-5 py-3.5 sm:px-8 sm:py-4 bg-[#C9A24D] hover:bg-[#b58f3c] text-[#0A261F] font-bold text-sm rounded-xl transition shadow-xl hover:scale-[1.02]">
                            <span>👜 Buka 1.500+ Katalog Pre-Order</span>
                            <span>→</span>
                        </a>
                        <a href="https://wa.me/628997919274?text=Halo%20Admin%20Kamelia%20Store%2C%20saya%20mau%20tanya-tanya%20koleksi%20tas%20pre-order%20dong" target="_blank" onclick="if(typeof fbq==='function') fbq('track', 'Contact');" class="inline-flex justify-center items-center gap-2 px-5 py-3.5 sm:px-8 sm:py-4 bg-emerald-800/90 hover:bg-emerald-700 text-white font-bold text-sm rounded-xl border border-emerald-600/50 transition">
                            <svg class="w-5 h-5 fill-current text-green-400" viewBox="0 0 24 24"><path d="M12.011 23.637c-3.132 0-6.105-1.226-8.381-3.454l-.442-.433-4.09 1.073 1.092-3.992-.387-.464c-2.454-2.935-3.803-6.61-3.803-10.367 0-9.117 7.439-16.516 16.582-16.516s16.582 7.399 16.582 16.516-7.439 16.516-16.582 16.516zm11.231-16.516c0-6.206-5.06-11.252-11.231-11.252-6.207 0-11.231 5.06-11.231 11.252 0 2.871 1.092 5.59 3.078 7.697l.63.673-.935 3.42 3.51-.92.68.665c2.14 2.083 4.966 3.228 7.96 3.228 6.207 0 11.231-5.06 11.231-11.252zm-12.723-5.228c-.146-.327-.301-.334-.441-.341-.115-.005-.248-.005-.381-.005-.133 0-.349.05-.532.249-.183.199-.698.68-.698 1.656 0 .975.714 1.916.814 2.049.099.133 1.376 2.217 3.407 3.033.483.195.86.311 1.155.405.485.151.926.13 1.275.078.388-.058 1.196-.488 1.362-.96.166-.472.166-.877.116-.96-.05-.083-.183-.133-.382-.233s-.382-.233-.532-.349c-.149-.116-.249-.166-.349-.1-.1.066-.2.166-.3.266s-.208.216-.301.327c-.092.112-.187.126-.386.026-.199-.099-.838-.309-1.595-.983-.591-.525-.99-1.173-1.106-1.372-.116-.199-.012-.307.087-.406.089-.089.199-.233.299-.349.099-.116.133-.199.199-.332.066-.133.033-.249-.017-.349s-.441-1.067-.611-1.485z" fill-rule="evenodd"/></svg>
                            <span>Chat Personal Concierge</span>
                        </a>
                    </div>

                    <!-- Trust Points Row -->
                    <div class="mt-10 pt-8 border-t border-emerald-800/60 grid grid-cols-2 sm:grid-cols-3 gap-4 text-xs text-emerald-200">
                        <div class="flex items-center gap-2">
                            <span class="text-amber-400 text-base">🛡️</span>
                            <span><strong>100% Asli</strong> Garansi Uang Kembali</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-amber-400 text-base">✈️</span>
                            <span><strong>Direct Sourcing</strong> Butik USA & Eropa</span>
                        </div>
                        <div class="flex items-center gap-2 col-span-2 sm:col-span-1">
                            <span class="text-amber-400 text-base">⭐</span>
                            <span><strong>4.9/5 Rating</strong> Kepuasan Klien VIP</span>
                        </div>
                    </div>

                </div>

                <!-- Hero Right: Featured Visual Showcase Card -->
                <div class="lg:col-span-5 relative" data-aos="fade-left" data-aos-duration="1000">
                    <div class="relative mx-auto max-w-sm sm:max-w-md bg-white/10 backdrop-blur-md rounded-3xl p-4 border border-white/20 shadow-2xl">
                        
                        <!-- Floating Badge -->
                        <div class="absolute -top-3 -right-3 bg-[#C9A24D] text-[#0A261F] text-xs font-extrabold px-3.5 py-1 rounded-full shadow-lg z-20">
                            ✨ Batch PO Minggu Ini
                        </div>

                        <!-- Showcase Image -->
                        <div class="relative overflow-hidden rounded-2xl aspect-[4/5] bg-gray-800">
                            <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?q=80&w=1200&auto=format&fit=crop" 
                                 alt="Kamelia Store Luxury Bag" 
                                 class="w-full h-full object-cover">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                            
                            <!-- Overlay Info -->
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <div class="text-xs uppercase tracking-widest text-amber-300 font-bold">Most Wanted Style</div>
                                <div class="font-serif-luxury font-bold text-lg sm:text-xl text-white mt-0.5">Coach & Tory Burch Edition</div>
                                <div class="mt-2 flex items-center justify-between text-xs">
                                    <span class="text-emerald-300 font-semibold">Pre-Order Hemat Hingga 50%</span>
                                    <span class="bg-white/20 backdrop-blur-xs px-2 py-0.5 rounded text-[11px]">Free Ongkir</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="mt-3 flex items-center justify-between px-2 text-xs text-emerald-100">
                            <span>📦 1.500+ Pilihan Model Siap PO</span>
                            <a href="{{ url('/katalog') }}" class="text-[#C9A24D] font-bold hover:underline">Lihat Semua →</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- 4. BRAND LOGO STRIP / MARQUEE -->
    <section id="brands" class="py-8 bg-white border-b border-gray-100 shadow-2xs">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-xs font-bold uppercase tracking-[0.25em] text-gray-400 mb-6">
                Brand Mewah Terpopuler di Kamelia Store
            </p>
            <div class="flex flex-wrap justify-center items-center gap-4 sm:gap-8 text-gray-800">
                @php
                    $brandsList = [
                        ['name' => 'COACH', 'origin' => 'New York'],
                        ['name' => 'TORY BURCH', 'origin' => 'New York'],
                        ['name' => 'KATE SPADE', 'origin' => 'New York'],
                        ['name' => 'MICHAEL KORS', 'origin' => 'USA'],
                        ['name' => 'PRADA', 'origin' => 'Milano'],
                        ['name' => 'MARC JACOBS', 'origin' => 'New York'],
                        ['name' => 'LONGCHAMP', 'origin' => 'Paris'],
                        ['name' => 'FOSSIL', 'origin' => 'Authentic'],
                        ['name' => 'AIGNER', 'origin' => 'Munich'],
                    ];
                @endphp
                @foreach ($brandsList as $b)
                    <a href="{{ url('/katalog') }}" class="group flex flex-col items-center px-3 py-2 sm:px-5 sm:py-3 rounded-xl bg-gray-50 hover:bg-emerald-50 border border-gray-100 hover:border-emerald-200 transition duration-300">
                        <span class="font-serif-luxury font-bold text-xs sm:text-base tracking-wider text-gray-900 group-hover:text-emerald-900">
                            {{ $b['name'] }}
                        </span>
                        <span class="text-[10px] text-gray-400 group-hover:text-emerald-700 tracking-widest uppercase">
                            {{ $b['origin'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. THREE TRUST PILLARS (VALUE PROPOSITION) -->
    <section class="py-16 sm:py-24 bg-[#FAF8F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
                <span class="text-emerald-800 text-xs font-bold uppercase tracking-[0.2em] block mb-2">Kenapa Memilih Kami</span>
                <h2 class="text-3xl sm:text-4xl font-serif-luxury font-bold text-gray-900">
                    Standar Baru Belanja Tas Mewah Tanpa Rasa Khawatir
                </h2>
                <p class="text-gray-600 mt-3 text-sm sm:text-base leading-relaxed">
                    Kami memahami bahwa membeli tas branded adalah bentuk investasi gaya hidup. Inilah mengapa kami memberikan 3 komitmen utama untuk Anda:
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Pillar 1 -->
                <div class="bg-white p-5 sm:p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-800 flex items-center justify-center text-2xl font-bold mb-6">
                        🛡️
                    </div>
                    <h3 class="font-serif-luxury font-bold text-xl text-gray-900 mb-3">
                        100% Authentic Guaranteed
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Garansi uang kembali 100% seumur hidup jika barang terbukti tidak original. Setiap barang melewati kurasi fisik ketat: inspeksi kulit, jahitan, hardware, dan serial number sebelum diserahkan ke Anda.
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-white p-5 sm:p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-800 flex items-center justify-center text-2xl font-bold mb-6">
                        💎
                    </div>
                    <h3 class="font-serif-luxury font-bold text-xl text-gray-900 mb-3">
                        Hemat Hingga 40% – 60%
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Dapatkan tas impian langsung dari sale butik & outlet resmi USA/Eropa. Tanpa beban biaya sewa toko mall mewah yang mahal, kami meneruskan penghematan harga ini langsung kepada Anda.
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-white p-5 sm:p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-800 flex items-center justify-center text-2xl font-bold mb-6">
                        💬
                    </div>
                    <h3 class="font-serif-luxury font-bold text-xl text-gray-900 mb-3">
                        Personal Concierge & Request
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Punya tas incaran tertentu yang langka atau belum ada di katalog? Kirimkan fotonya via WhatsApp ke tim kami. Personal Shopper kami akan mencarikan dan mengamankan unitnya untuk Anda.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. FEATURED BEST SELLERS (REAL PRODUCTS PREVIEW) -->
    <section id="featured" class="py-16 sm:py-24 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12" data-aos="fade-up">
                <div>
                    <span class="text-emerald-800 text-xs font-bold uppercase tracking-[0.2em] block mb-2">Trending Collections</span>
                    <h2 class="text-3xl sm:text-4xl font-serif-luxury font-bold text-gray-900">
                        Koleksi Pre-Order Paling Diminati
                    </h2>
                    <p class="text-gray-600 mt-2 text-sm max-w-xl">
                        Pilihan favorit para pelanggan minggu ini. Kondisi terjamin mulus (*Like New / Grade A*), lengkap, dan siap dipesan.
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ url('/katalog') }}" class="inline-flex items-center gap-2 text-sm font-bold text-emerald-800 hover:text-emerald-950 transition">
                        <span>Lihat 1.500+ Koleksi di Katalog</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($featuredProducts ?? [] as $product)
                    <div class="bg-[#FAF8F5] rounded-2xl overflow-hidden border border-gray-200/80 hover:border-emerald-600 hover:shadow-xl transition duration-300 flex flex-col group" data-aos="fade-up">
                        
                        <!-- Product Image Container -->
                        <div class="relative aspect-[4/3] sm:aspect-[4/4] overflow-hidden bg-gray-100">
                            <img src="{{ $product['photo'] }}" 
                                 alt="{{ $product['title'] }}" 
                                 loading="lazy"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                                <span class="bg-[#0A261F] text-[#C9A24D] text-[10px] font-bold px-2.5 py-1 rounded-md tracking-wider uppercase shadow-xs">
                                    {{ $product['brand'] }}
                                </span>
                            </div>

                            <div class="absolute bottom-3 left-3 right-3">
                                <span class="inline-block bg-white/95 backdrop-blur-xs text-gray-700 text-[11px] font-semibold px-2.5 py-1 rounded-lg shadow-2xs">
                                    {{ $product['condition'] }}
                                </span>
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="p-5 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="font-bold text-gray-900 text-base leading-snug line-clamp-2 group-hover:text-emerald-800 transition">
                                    {{ $product['title'] }}
                                </h3>

                                <!-- Pricing -->
                                <div class="mt-4 pt-3 border-t border-gray-200/60 flex items-baseline justify-between">
                                    <div>
                                        <div class="text-[11px] text-gray-400">Estimasi Harga PO:</div>
                                        <div class="text-lg sm:text-xl font-bold text-emerald-900">
                                            {{ $product['selling_idr_formatted'] }}
                                        </div>
                                    </div>
                                    @if (!empty($product['retail_ref_formatted']))
                                        <div class="text-right">
                                            <div class="text-[10px] text-gray-400">Butik Mall:</div>
                                            <div class="text-xs text-gray-400 line-through">
                                                {{ $product['retail_ref_formatted'] }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-5 grid grid-cols-2 gap-2.5 pt-2">
                                <a href="https://wa.me/628997919274?text=Halo%20Admin%20Kamelia%20Store%2C%20saya%20tertarik%20dengan%20Pre-Order%20tas%20{{ urlencode($product['brand'] . ' - ' . $product['title']) }}%20harga%20{{ urlencode($product['selling_idr_formatted']) }}%20apakah%20masih%20tersedia%3F" target="_blank" onclick="if(typeof fbq==='function') fbq('track', 'InitiateCheckout', {content_name: '{{ addslashes($product['title']) }}', content_category: '{{ addslashes($product['brand']) }}'});" class="flex items-center justify-center gap-1.5 py-2.5 px-3 bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold rounded-xl transition shadow-xs">
                                    <span>💬 Order WA</span>
                                </a>
                                <a href="{{ url('/katalog') }}" class="flex items-center justify-center py-2.5 px-3 bg-white hover:bg-gray-100 text-gray-800 border border-gray-300 text-xs font-bold rounded-xl transition">
                                    <span>Detail Tas</span>
                                </a>
                            </div>
                        </div>

                    </div>
                @empty
                    <!-- Fallback if catalog not yet loaded -->
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">Koleksi sedang dipersiapkan. Silakan kunjungi katalog lengkap kami.</p>
                        <a href="{{ url('/katalog') }}" class="mt-4 inline-block px-6 py-3 bg-emerald-800 text-white rounded-xl font-bold text-sm">
                            Buka Katalog Toko
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Big Bottom Catalog CTA -->
            <div class="mt-14 text-center">
                <a href="{{ url('/katalog') }}" class="inline-flex items-center gap-3 px-6 py-3.5 sm:px-10 sm:py-4 bg-[#0A261F] text-[#C9A24D] font-bold text-sm rounded-xl hover:bg-emerald-900 transition shadow-lg">
                    <span>Lihat Seluruh 1.500+ Koleksi Pre-Order di Katalog</span>
                    <span>→</span>
                </a>
            </div>

        </div>
    </section>

    <!-- 7. HOW IT WORKS (CARA PRE-ORDER) -->
    <section id="how-it-works" class="py-16 sm:py-24 bg-[#FAF8F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-emerald-800 text-xs font-bold uppercase tracking-[0.2em] block mb-2">Transparan & Mudah</span>
                <h2 class="text-3xl sm:text-4xl font-serif-luxury font-bold text-gray-900">
                    4 Langkah Mudah Memiliki Tas Impian
                </h2>
                <p class="text-gray-600 mt-3 text-sm sm:text-base">
                    Sistem Pre-Order di Kamelia Store dirancang agar aman, transparan, dan tanpa repot.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Step 1 -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200/70 shadow-xs relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-3xl font-serif-luxury font-bold text-emerald-800/30 absolute top-4 right-5">01</div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-xl mb-4">
                        🔍
                    </div>
                    <h3 class="font-bold text-gray-900 text-base mb-2">Pilih Model Tas</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Pilih dari katalog toko kami atau kirimkan foto tas impian yang Anda cari langsung ke WhatsApp Personal Concierge kami.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200/70 shadow-xs relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-3xl font-serif-luxury font-bold text-emerald-800/30 absolute top-4 right-5">02</div>
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold text-xl mb-4">
                        💳
                    </div>
                    <h3 class="font-bold text-gray-900 text-base mb-2">Booking & DP Ringan</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Kunci pesanan dengan Down Payment (DP) aman. Tim kurasi kami langsung mengamankan unit tas dari butik mitra di luar negeri.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200/70 shadow-xs relative" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-3xl font-serif-luxury font-bold text-emerald-800/30 absolute top-4 right-5">03</div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-xl mb-4">
                        🔬
                    </div>
                    <h3 class="font-bold text-gray-900 text-base mb-2">Inspeksi & Verifikasi</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Saat barang tiba di Indonesia, tim kami memeriksa keaslian fisik, hardware, dan kelengkapannya secara detail untuk kepuasan Anda.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200/70 shadow-xs relative" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-3xl font-serif-luxury font-bold text-emerald-800/30 absolute top-4 right-5">04</div>
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold text-xl mb-4">
                        📦
                    </div>
                    <h3 class="font-bold text-gray-900 text-base mb-2">Kirim Berasuransi</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Setelah pelunasan, paket tas mewah Anda dikirim menggunakan ekspedisi cepat berasuransi penuh sampai di tangan Anda.
                    </p>
                </div>

            </div>

            <!-- WhatsApp Direct Consultation Banner -->
            <div class="mt-12 bg-emerald-900 text-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl">
                <div>
                    <h4 class="font-serif-luxury font-bold text-xl sm:text-2xl text-amber-300">
                        Punya pertanyaan seputar estimasi waktu dan pengiriman?
                    </h4>
                    <p class="text-xs sm:text-sm text-emerald-100 mt-1">
                        Tim admin WhatsApp kami siap merespons dengan cepat dan ramah.
                    </p>
                </div>
                <a href="https://wa.me/628997919274?text=Halo%20Admin%20Kamelia%20Store%2C%20saya%20ingin%20tanya%20detail%20alur%20pre-order%20tas" target="_blank" onclick="if(typeof fbq==='function') fbq('track', 'Contact');" class="shrink-0 px-6 py-3.5 bg-white text-emerald-950 hover:bg-amber-300 font-bold text-xs sm:text-sm rounded-xl transition shadow-md">
                    💬 Tanya Admin (0899-7919-274)
                </a>
            </div>

        </div>
    </section>

    <!-- 8. AUTHENTICITY SECTION -->
    <section id="authenticity" class="py-16 sm:py-24 bg-white border-y border-gray-100">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-emerald-800 text-xs font-bold uppercase tracking-[0.2em] block mb-2">Integritas Tanpa Kompromi</span>
                <h2 class="text-3xl sm:text-4xl font-serif-luxury font-bold text-gray-900">
                    Jaminan Keaslian Seumur Hidup
                </h2>
                <p class="text-gray-600 mt-3 text-sm sm:text-base max-w-2xl mx-auto">
                    Kamelia Store menerapkan protokol kurasi ketat untuk memastikan tidak ada satupun produk palsu (*fake/mirror/KW*) yang sampai ke tangan pelanggan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                
                <div class="space-y-4" data-aos="fade-right">
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-sm shrink-0 mt-0.5">✓</div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Inspeksi Tekstur & Material Kulit</h4>
                            <p class="text-xs text-gray-600 mt-1">Pengecekan aroma khas kulit asli, kelembutan, tekstur saffiano/pebbled leather, dan daya tahan jahitan (*stitching precision*).</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-sm shrink-0 mt-0.5">✓</div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Validasi Hardware Logam & Engraving</h4>
                            <p class="text-xs text-gray-600 mt-1">Zipper YKK/riri khusus, bobot logam hardware, lapisan emas/perak anti-karat, dan ketajaman logo emboss brand.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-sm shrink-0 mt-0.5">✓</div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Pencocokan Serial Number & Date Code</h4>
                            <p class="text-xs text-gray-600 mt-1">Cross-check nomor seri pada tag dalam tas terhadap database pabrikan resmi untuk memastikan tahun rilis dan pabrik produksi.</p>
                        </div>
                    </div>
                </div>

                <!-- Authenticity Guarantee Certificate Card -->
                <div class="bg-gradient-to-br from-[#0A261F] to-[#051410] text-white p-5 sm:p-8 rounded-2xl sm:rounded-3xl border border-[#C9A24D]/40 shadow-2xl relative" data-aos="fade-left">
                    <div class="text-[#C9A24D] text-xs font-bold uppercase tracking-widest mb-3">
                        Pledge of Trust
                    </div>
                    <h3 class="font-serif-luxury font-bold text-2xl text-amber-200">
                        100% Money-Back Guarantee
                    </h3>
                    <p class="text-xs sm:text-sm text-emerald-100/90 mt-4 leading-relaxed">
                        Jika dalam keadaan apapun barang yang Anda terima dari Kamelia Store terbukti tidak asli oleh pihak pemeriksa resmi (*authorized store / Entrupy verified*), kami memberikan <strong>pengembalian uang 100% penuh</strong> tanpa potongan apapun.
                    </p>
                    <div class="mt-6 pt-6 border-t border-emerald-800/80 flex items-center justify-between">
                        <div>
                            <div class="text-xs text-gray-400">Verifikasi Langsung:</div>
                            <div class="text-sm font-bold text-white">0899-7919-274</div>
                        </div>
                        <a href="https://wa.me/628997919274?text=Halo%20Admin%2C%20saya%20ingin%20tanya%20detail%20garansi%20keaslian%20tas" target="_blank" onclick="if(typeof fbq==='function') fbq('track', 'Contact');" class="px-4 py-2 bg-[#C9A24D] hover:bg-[#b58f3c] text-[#0A261F] font-bold text-xs rounded-lg transition">
                            Konsultasi Garansi
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 9. TESTIMONIALS & SOCIAL PROOF -->
    <section id="testimonials" class="py-16 sm:py-24 bg-[#FAF8F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
                <span class="text-emerald-800 text-xs font-bold uppercase tracking-[0.2em] block mb-2">Testimoni Nyata</span>
                <h2 class="text-3xl sm:text-4xl font-serif-luxury font-bold text-gray-900">
                    Kata Mereka yang Sudah Membuktikan
                </h2>
                <p class="text-gray-600 mt-3 text-sm">
                    Kepuasan dan senyuman pelanggan adalah prioritas tertinggi kami di Kamelia Store.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Review 1 -->
                <div class="bg-white p-5 sm:p-7 rounded-2xl border border-gray-200/80 shadow-xs flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="flex text-amber-400 text-sm mb-3">★★★★★</div>
                        <p class="text-sm text-gray-700 italic leading-relaxed">
                            "Awalnya deg-degan beli tas branded PO online, ternyata tas Coach-nya sampai dengan kondisi mulus banget, lengkap tag & care card! Adminnya super ramah di WhatsApp, selalu update posisi paket."
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-900 font-bold flex items-center justify-center text-sm">
                            AR
                        </div>
                        <div>
                            <div class="font-bold text-sm text-gray-900">Amanda Ryanti</div>
                            <div class="text-[11px] text-gray-500">Jakarta Selatan • Coach Signature PO</div>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="bg-white p-5 sm:p-7 rounded-2xl border border-gray-200/80 shadow-xs flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="flex text-amber-400 text-sm mb-3">★★★★★</div>
                        <p class="text-sm text-gray-700 italic leading-relaxed">
                            "Harga jauh lebih ramah di kantong daripada beli langsung di butik mall Surabaya. Tas Tory Burch-nya 100% original, sudah saya cek detail jahitan dan kulitnya sangat rapi. Bakal langganan terus di Kamelia Store!"
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-amber-100 text-amber-900 font-bold flex items-center justify-center text-sm">
                            CP
                        </div>
                        <div>
                            <div class="font-bold text-sm text-gray-900">dr. Cindy Pratiwi</div>
                            <div class="text-[11px] text-gray-500">Surabaya • Tory Burch Shoulder Bag</div>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="bg-white p-5 sm:p-7 rounded-2xl border border-gray-200/80 shadow-xs flex flex-col justify-between" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="flex text-amber-400 text-sm mb-3">★★★★★</div>
                        <p class="text-sm text-gray-700 italic leading-relaxed">
                            "Layanan personal concierge-nya juara! Aku cuma kirim foto tas Kate Spade yang lagi langka, 3 minggu kemudian tasnya udah mendarat di rumah dengan packing kayu super aman. Recommended seller!"
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-900 font-bold flex items-center justify-center text-sm">
                            JV
                        </div>
                        <div>
                            <div class="font-bold text-sm text-gray-900">Jessica Valentina</div>
                            <div class="text-[11px] text-gray-500">Bandung • Kate Spade 2-Way Satchel</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Stats Bar -->
            <div class="mt-12 bg-white rounded-2xl p-4 sm:p-6 border border-gray-200/70 grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
                <div>
                    <div class="text-2xl sm:text-3xl font-serif-luxury font-bold text-emerald-900">1.500+</div>
                    <div class="text-xs text-gray-500 mt-1">Katalog Pre-Order</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-serif-luxury font-bold text-emerald-900">100%</div>
                    <div class="text-xs text-gray-500 mt-1">Authentic Guarantee</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-serif-luxury font-bold text-emerald-900">1.200+</div>
                    <div class="text-xs text-gray-500 mt-1">Tas Terkirim Aman</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-serif-luxury font-bold text-emerald-900">4.9/5</div>
                    <div class="text-xs text-gray-500 mt-1">Tingkat Kepuasan</div>
                </div>
            </div>

        </div>
    </section>

    <!-- 10. FAQ SECTION -->
    <section class="py-16 sm:py-24 bg-white border-t border-gray-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <span class="text-emerald-800 text-xs font-bold uppercase tracking-[0.2em] block mb-2">FAQ</span>
                <h2 class="text-3xl font-serif-luxury font-bold text-gray-900">Pertanyaan yang Sering Diajukan</h2>
            </div>

            <div class="space-y-4">
                <div class="p-5 rounded-2xl bg-gray-50 border border-gray-100">
                    <h4 class="font-bold text-gray-900 text-sm sm:text-base">Apakah barang di Kamelia Store pasti 100% original?</h4>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2 leading-relaxed">
                        Ya, 100% dijamin original. Kami memiliki tim kurasi dan inspektur fisik yang memeriksa setiap detail tas sebelum dikirim ke pelanggan. Kami memberikan garansi uang kembali 100% jika terbukti tidak asli.
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-gray-50 border border-gray-100">
                    <h4 class="font-bold text-gray-900 text-sm sm:text-base">Berapa lama estimasi pengiriman Pre-Order?</h4>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2 leading-relaxed">
                        Estimasi barang Pre-Order tiba di Indonesia umumnya berkisar antara 2 hingga 4 minggu (tergantung negara asal butik, seperti USA, Jepang, atau Eropa). Tim admin WhatsApp kami akan selalu menginfokan update nomor resi dan tracking secara berkala.
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-gray-50 border border-gray-100">
                    <h4 class="font-bold text-gray-900 text-sm sm:text-base">Bagaimana sistem pembayarannya?</h4>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2 leading-relaxed">
                        Anda cukup membayar Down Payment (DP) awal untuk mengamankan unit tas di butik sumber. Sisa tagihan baru dilunasi ketika barang sudah selesai diinspeksi keasliannya dan siap dikirim ke alamat rumah Anda.
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-gray-50 border border-gray-100">
                    <h4 class="font-bold text-gray-900 text-sm sm:text-base">Bisa request model tas yang tidak ada di katalog?</h4>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2 leading-relaxed">
                        Tentu saja bisa! Cukup kirimkan foto atau nama seri tas incaran Anda ke WhatsApp Personal Concierge kami di <strong>0899-7919-274</strong>. Kami akan mencarikannya langsung ke jaringan butik kami.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. FINAL CONVERSION BANNER -->
    <section class="py-16 sm:py-24 luxury-gradient text-white text-center relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 relative z-10" data-aos="zoom-in">
            <span class="text-amber-300 font-bold uppercase tracking-[0.25em] text-xs block mb-3">Siap Tampil Percaya Diri?</span>
            <h2 class="text-2xl sm:text-3xl lg:text-5xl font-serif-luxury font-bold leading-tight">
                Temukan Koleksi Tas Mewah Impian Anda Hari Ini
            </h2>
            <p class="text-emerald-100/90 text-sm sm:text-base max-w-xl mx-auto mt-4 leading-relaxed">
                Nikmati kemudahan Pre-Order tas original dengan harga terbaik dan jaminan keaslian seumur hidup bersama Kamelia Store.
            </p>
            <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/katalog') }}" class="px-5 py-3.5 sm:px-8 sm:py-4 bg-[#C9A24D] hover:bg-[#b58f3c] text-[#0A261F] font-bold text-sm rounded-xl transition shadow-xl">
                    👜 Jelajahi 1.500+ Katalog Pre-Order
                </a>
                <a href="https://wa.me/628997919274?text=Halo%20Admin%20Kamelia%20Store%2C%20saya%20ingin%20konsultasi%20tas%20pre-order" target="_blank" onclick="if(typeof fbq==='function') fbq('track', 'Contact');" class="px-5 py-3.5 sm:px-8 sm:py-4 bg-emerald-700 hover:bg-emerald-600 text-white font-bold text-sm rounded-xl border border-emerald-500/50 transition">
                    💬 Hubungi WhatsApp: 0899-7919-274
                </a>
            </div>
        </div>
    </section>

    <!-- 12. FOOTER -->
    <footer class="bg-[#051410] py-14 text-emerald-100/80 border-t border-emerald-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <div class="md:col-span-2">
                <div class="flex items-center gap-2.5 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-emerald-900 text-[#C9A24D] flex items-center justify-center font-serif-luxury font-bold text-base">
                        KS
                    </div>
                    <div class="font-serif-luxury font-bold text-xl text-white tracking-wider">
                        KAMELIA STORE
                    </div>
                </div>
                <p class="text-xs sm:text-sm text-gray-400 max-w-md leading-relaxed">
                    Butik Pre-Order terpercaya untuk tas, dompet, dan jam tangan branded 100% original. Menghubungkan pecinta fashion Indonesia dengan butik resmi ternama di USA, Jepang, dan Eropa.
                </p>
                <div class="mt-4 text-xs text-amber-300 font-semibold">
                    Layanan WhatsApp Personal Concierge: 0899-7919-274
                </div>
            </div>

            <div>
                <h5 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Tautan Cepat</h5>
                <ul class="text-xs space-y-2.5">
                    <li><a href="{{ url('/katalog') }}" class="hover:text-amber-300 transition">Katalog Pre-Order (1.500+)</a></li>
                    <li><a href="#brands" class="hover:text-amber-300 transition">Brand Pilihan</a></li>
                    <li><a href="#how-it-works" class="hover:text-amber-300 transition">Cara Kerja Pre-Order</a></li>
                    <li><a href="#authenticity" class="hover:text-amber-300 transition">Jaminan Keaslian 100%</a></li>
                    <li><a href="#testimonials" class="hover:text-amber-300 transition">Testimoni Klien</a></li>
                </ul>
            </div>

            <div>
                <h5 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Hubungi Kami</h5>
                <div class="text-xs space-y-2 text-gray-400">
                    <p><strong class="text-white">WhatsApp:</strong> 0899-7919-274</p>
                    <p><strong class="text-white">Jam Operasional:</strong> 09:00 - 21:00 WIB (Senin - Minggu)</p>
                    <p><strong class="text-white">Wilayah Layanan:</strong> Pengiriman Seluruh Indonesia</p>
                    <p class="text-[11px] text-amber-300/80 pt-2">🛡️ 100% Authentic Money-Back Guarantee Policy</p>
                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto px-4 mt-12 pt-6 border-t border-emerald-900/40 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} Kamelia Store. All rights reserved. Authentic Luxury Pre-Order Boutique.
        </div>
    </footer>

    <!-- 13. FLOATING WHATSAPP BUTTON (SAFE NO-OVERFLOW) -->
    <div class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-50 flex flex-col items-end pointer-events-none">
        <!-- Floating Tooltip Notification (Desktop only) -->
        <div class="mb-2 hidden sm:flex items-center gap-1.5 bg-white text-gray-800 text-xs font-bold py-1.5 px-3 rounded-full shadow-lg border border-emerald-100 pointer-events-auto">
            <span class="w-2 h-2 rounded-full bg-green-500"></span>
            <span>Tanya Admin / Request Tas</span>
        </div>

        <!-- WhatsApp Icon Button with Box-Shadow Pulse (No Scale/Overflow) -->
        <a href="https://wa.me/628997919274?text=Halo%20Admin%20Kamelia%20Store%2C%20saya%20tertarik%20tanya-tanya%20koleksi%20tas%20pre-order" 
           target="_blank" 
           title="Hubungi WhatsApp: 0899-7919-274"
           aria-label="Chat WhatsApp Admin"
           onclick="if(typeof fbq==='function') fbq('track', 'Contact');"
           class="wa-pulse w-12 h-12 sm:w-14 sm:h-14 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full shadow-xl flex items-center justify-center transition duration-200 pointer-events-auto">
            <svg class="w-6 h-6 sm:w-7 sm:h-7 fill-current" viewBox="0 0 24 24">
                <path d="M12.011 23.637c-3.132 0-6.105-1.226-8.381-3.454l-.442-.433-4.09 1.073 1.092-3.992-.387-.464c-2.454-2.935-3.803-6.61-3.803-10.367 0-9.117 7.439-16.516 16.582-16.516s16.582 7.399 16.582 16.516-7.439 16.516-16.582 16.516zm11.231-16.516c0-6.206-5.06-11.252-11.231-11.252-6.207 0-11.231 5.06-11.231 11.252 0 2.871 1.092 5.59 3.078 7.697l.63.673-.935 3.42 3.51-.92.68.665c2.14 2.083 4.966 3.228 7.96 3.228 6.207 0 11.231-5.06 11.231-11.252zm-12.723-5.228c-.146-.327-.301-.334-.441-.341-.115-.005-.248-.005-.381-.005-.133 0-.349.05-.532.249-.183.199-.698.68-.698 1.656 0 .975.714 1.916.814 2.049.099.133 1.376 2.217 3.407 3.033.483.195.86.311 1.155.405.485.151.926.13 1.275.078.388-.058 1.196-.488 1.362-.96.166-.472.166-.877.116-.96-.05-.083-.183-.133-.382-.233s-.382-.233-.532-.349c-.149-.116-.249-.166-.349-.1-.1.066-.2.166-.3.266s-.208.216-.301.327c-.092.112-.187.126-.386.026-.199-.099-.838-.309-1.595-.983-.591-.525-.99-1.173-1.106-1.372-.116-.199-.012-.307.087-.406.089-.089.199-.233.299-.349.099-.116.133-.199.199-.332.066-.133.033-.249-.017-.349s-.441-1.067-.611-1.485z" fill-rule="evenodd"/>
            </svg>
        </a>
    </div>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true,
                easing: 'ease-out-quad',
                duration: 800,
            });
        });
    </script>
</body>
</html>