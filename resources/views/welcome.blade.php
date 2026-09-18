<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kamelia Store | Authentic Luxury Sovereignty</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; overflow-x: hidden; }
        h1, h2, .font-display { font-family: 'Playfair Display', serif; }
        .hero-video-container { position: relative; width: 100%; height: 100%; overflow: hidden; }
        #heroVideo { position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: 0; transform: translateX(-50%) translateY(-50%); object-fit: cover; }
    </style>
</head>
<body class="antialiased bg-white text-gray-900" x-data="{ mobileMenu: false }">

    <!-- Navigation Bar -->
    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 sm:h-20 items-center">
                
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <div class="flex items-center justify-center w-9 h-9 bg-[#0A261F] text-[#C9A24D] rounded-lg font-serif font-bold text-lg">
                        KS
                    </div>
                    <div class="font-bold text-lg sm:text-2xl tracking-widest text-gray-900">
                        KAMELIA <span class="text-emerald-800">STORE</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 text-xs uppercase tracking-widest font-semibold text-gray-600 items-center">
                    <a href="{{ url('/katalog') }}" class="text-emerald-800 font-bold hover:text-emerald-900 transition flex items-center gap-1.5 bg-emerald-50 px-3 py-1.5 rounded-full border border-emerald-200">
                        <span>Katalog Toko</span>
                        <span class="bg-emerald-700 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">900+ PO</span>
                    </a>
                    <a href="#collections" class="hover:text-emerald-800 transition">Collections</a>
                    <a href="#authenticity" class="hover:text-emerald-800 transition">Authenticity</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-emerald-800 font-bold hover:underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="hover:text-black">Sign In</a>
                        @endauth
                    @endif
                </div>

                <!-- Right Actions & Mobile Hamburger -->
                <div class="flex items-center space-x-2">
                    <a href="{{ url('/katalog') }}" class="p-2 text-emerald-800 hover:text-emerald-900" title="Buka Katalog">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                    </a>

                    <!-- Mobile Menu Hamburger Button -->
                    <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100 transition focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Menu Dropdown Drawer -->
        <div x-show="mobileMenu" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden border-t border-gray-100 bg-white shadow-lg px-4 py-4 space-y-3"
             style="display: none;">
            <a href="{{ url('/katalog') }}" @click="mobileMenu = false" class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-emerald-50 text-emerald-900 font-bold text-sm">
                <span>👜 Katalog Pre-Order</span>
                <span class="bg-emerald-700 text-white text-xs px-2 py-0.5 rounded-full">1.500+ Item</span>
            </a>
            <a href="#collections" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-gray-700 font-medium text-sm hover:bg-gray-50">
                💎 Koleksi Masterpiece
            </a>
            <a href="#authenticity" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-gray-700 font-medium text-sm hover:bg-gray-50">
                🛡️ Verifikasi Keaslian
            </a>
            <div class="pt-2 border-t border-gray-100">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block px-3 py-2 rounded-lg text-emerald-800 font-bold text-sm bg-gray-50">
                            👤 Buka Dashboard Akun
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded-lg text-gray-800 font-bold text-sm">
                            🔑 Masuk (Sign In)
                        </a>
                        <a href="{{ route('register') }}" class="block mt-1 px-3 py-2 rounded-lg bg-[#0A261F] text-[#C9A24D] font-bold text-sm text-center">
                            Daftar Member VIP
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative min-h-[75vh] sm:min-h-[85vh] flex items-center overflow-hidden bg-gray-900 py-16 sm:py-0">
        <div class="hero-video-container">
            <video autoplay loop muted playsinline id="heroVideo" class="opacity-60">
                <source src="https://assets.mixkit.co/videos/preview/mixkit-luxury-watch-shining-in-the-dark-32658-large.mp4" type="video/mp4">
            </video>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 text-white w-full" data-aos="fade-up" data-aos-duration="1200">
            <span class="text-amber-300 font-bold tracking-[0.2em] sm:tracking-[0.3em] uppercase text-[10px] sm:text-xs mb-3 sm:mb-4 block font-mono">
                Verified Pre-Owned Luxury
            </span>
            <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-serif font-bold leading-tight">
                Authentic <br> <span class="text-emerald-300 italic">Investments.</span>
            </h1>
            <p class="mt-4 sm:mt-8 text-sm sm:text-lg md:text-xl text-gray-200 max-w-xl leading-relaxed opacity-90">
                Langkah berdaulat menuju gaya hidup premium. Koleksi tas, dompet, dan jam tangan branded terverifikasi melalui sistem Pre-Order resmi Kamelia Store, menjaga nilai investasi gaya Anda dengan elegan.
            </p>
            <div class="mt-8 sm:mt-12 flex flex-col sm:flex-row gap-4">
                <a href="{{ url('/katalog') }}" class="inline-flex justify-center items-center px-8 sm:px-12 py-4 sm:py-5 bg-emerald-700 text-white text-xs sm:text-sm font-bold tracking-widest uppercase hover:bg-white hover:text-emerald-900 transition shadow-2xl rounded-xl">
                    Katalog Pre-Order (1.500+ Item)
                </a>
            </div>
        </div>
    </header>

    <!-- Trust Badges -->
    <section class="py-6 sm:py-8 bg-gray-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 text-center text-xs sm:text-sm font-semibold text-gray-700">
            <div class="flex items-center justify-center gap-2.5 p-2">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <span>100% Authenticity Guaranteed</span>
            </div>
            <div class="flex items-center justify-center gap-2.5 p-2">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 009 11c0-1.28-.211-2.476-.588-3.593m-.009 15.225A21.186 21.186 0 013 18c0-1.104.196-2.162.55-3.137m13.132 5.903a9.223 9.223 0 01-3.6 1.117m1.267-17.272a10.963 10.963 0 011.968-.41m2.713 2.231a2.916 2.916 0 012.353 2.139"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11c0 2.707 1.846 4.975 4.341 5.655l.02.006a8.239 8.239 0 001.522-6.572A9.23 9.23 0 0015 11z"/></svg>
                <span>Rigid Physical Inspection</span>
            </div>
            <div class="flex items-center justify-center gap-2.5 p-2">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                <span>Sovereign & Secured Transaction</span>
            </div>
        </div>
    </section>

    <!-- Curated Masterpieces -->
    <section id="collections" class="py-16 sm:py-28 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-20" data-aos="fade-up">
                <h2 class="text-3xl sm:text-5xl font-serif font-bold">Curated Masterpieces</h2>
                <p class="text-emerald-800 tracking-[0.2em] uppercase text-xs mt-3 font-bold">Definisi Gaya yang Berdaulat</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-12">
                <a href="{{ url('/katalog') }}" class="group cursor-pointer block" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative overflow-hidden aspect-[4/5] bg-gray-100 rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
                        <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?q=80&w=1935&auto=format&fit=crop" class="object-cover w-full h-full group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-emerald-950/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <span class="text-white border border-white px-6 py-2 text-xs tracking-widest font-bold uppercase rounded-lg">Discover Handbags</span>
                        </div>
                    </div>
                </a>
                <a href="{{ url('/katalog') }}" class="group cursor-pointer block" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative overflow-hidden aspect-[4/5] bg-gray-100 rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop" class="object-cover w-full h-full group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-emerald-950/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <span class="text-white border border-white px-6 py-2 text-xs tracking-widest font-bold uppercase rounded-lg">Explore Timepieces</span>
                        </div>
                    </div>
                </a>
                <a href="{{ url('/katalog') }}" class="group cursor-pointer block sm:col-span-2 md:col-span-1" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative overflow-hidden aspect-[4/5] bg-gray-100 rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
                        <img src="https://images.unsplash.com/photo-1627123424574-724758594e93?q=80&w=1974&auto=format&fit=crop" class="object-cover w-full h-full group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-emerald-950/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <span class="text-white border border-white px-6 py-2 text-xs tracking-widest font-bold uppercase rounded-lg">Wallets & Leathers</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Authenticity Section -->
    <section id="authenticity" class="py-16 sm:py-24 bg-gray-50 border-y border-gray-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h2 class="text-2xl sm:text-4xl md:text-5xl font-serif font-bold mb-6 sm:mb-8" data-aos="fade-up">Verifikasi Fisik & Digital</h2>
            <p class="text-gray-600 mb-8 sm:mb-10 max-w-2xl mx-auto text-xs sm:text-sm leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                Kami membangun standar transparansi tinggi. Masukkan nomor seri atau SKU produk pesanan Anda untuk meninjau status inspeksi keaslian.
            </p>
            <div class="bg-white p-4 sm:p-6 rounded-2xl shadow-lg border border-gray-100 flex flex-col sm:flex-row gap-3" data-aos="zoom-in" data-aos-delay="200">
                <input type="text" placeholder="Contoh: KAL123456789" class="flex-grow border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-xl text-sm p-3">
                <button class="px-6 sm:px-8 py-3 bg-[#0A261F] text-[#C9A24D] text-xs font-bold tracking-widest uppercase hover:bg-emerald-800 transition rounded-xl">Check Authenticity</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#0a261f] py-12 sm:py-16 text-emerald-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-12 text-center md:text-left">
            <div>
                <div class="font-bold tracking-widest text-xl text-white mb-3">KAMELIA STORE</div>
                <p class="text-xs sm:text-sm opacity-70">Luxury Authentic Sovereign — Est. 2024</p>
            </div>
            <div class="text-xs sm:text-sm space-y-1.5 opacity-80">
                <p>100% Guaranteed Authenticity Policy</p>
                <p>Personal Concierge & Pre-Order Service</p>
            </div>
            <div class="text-xs tracking-widest uppercase opacity-60">
                &copy; {{ date('Y') }} Kamelia Store. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Concierge Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20Personal%20Concierge%20Kamelia%20Store" class="fixed bottom-5 right-5 p-3.5 sm:p-4 bg-emerald-600 text-white rounded-full shadow-2xl hover:bg-emerald-700 transition z-50 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12.011 23.637c-3.132 0-6.105-1.226-8.381-3.454l-.442-.433-4.09 1.073 1.092-3.992-.387-.464c-2.454-2.935-3.803-6.61-3.803-10.367 0-9.117 7.439-16.516 16.582-16.516s16.582 7.399 16.582 16.516-7.439 16.516-16.582 16.516zm11.231-16.516c0-6.206-5.06-11.252-11.231-11.252-6.207 0-11.231 5.06-11.231 11.252 0 2.871 1.092 5.59 3.078 7.697l.63.673-.935 3.42 3.51-.92.68.665c2.14 2.083 4.966 3.228 7.96 3.228 6.207 0 11.231-5.06 11.231-11.252zm-12.723-5.228c-.146-.327-.301-.334-.441-.341-.115-.005-.248-.005-.381-.005-.133 0-.349.05-.532.249-.183.199-.698.68-.698 1.656 0 .975.714 1.916.814 2.049.099.133 1.376 2.217 3.407 3.033.483.195.86.311 1.155.405.485.151.926.13 1.275.078.388-.058 1.196-.488 1.362-.96.166-.472.166-.877.116-.96-.05-.083-.183-.133-.382-.233s-.382-.233-.532-.349c-.149-.116-.249-.166-.349-.1-.1.066-.2.166-.3.266s-.208.216-.301.327c-.092.112-.187.126-.386.026-.199-.099-.838-.309-1.595-.983-.591-.525-.99-1.173-1.106-1.372-.116-.199-.012-.307.087-.406.089-.089.199-.233.299-.349.099-.116.133-.199.199-.332.066-.133.033-.249-.017-.349s-.441-1.067-.611-1.485z" fill-rule="evenodd" clip-rule="evenodd"/></svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            easing: 'ease-out-quad',
        });
    </script>
</body>
</html>