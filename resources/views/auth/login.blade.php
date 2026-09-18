<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-[#0A261F] font-serif tracking-tight">Masuk ke Akun Anda</h2>
        <p class="text-sm text-gray-500 mt-1.5">Selamat datang kembali di Kamelia Store</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-[#0A261F] mb-1.5">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 transition duration-200"
                   placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-[#0A261F] mb-1.5">Kata Sandi</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 transition duration-200"
                   placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-gray-300 text-emerald-700 focus:ring-emerald-600 focus:ring-offset-0" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-medium text-emerald-700 hover:text-emerald-900 transition" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-[#0A261F] text-white font-bold text-sm uppercase tracking-wider rounded-xl hover:bg-[#0E352B] focus:outline-none focus:ring-2 focus:ring-[#0A261F]/50 focus:ring-offset-2 active:bg-[#071a15] transition duration-200 shadow-lg shadow-emerald-900/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
            {{ __('Masuk') }}
        </button>
    </form>

    <!-- Divider -->
    <div class="relative my-8">
        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-200"></div></div>
        <div class="relative flex justify-center"><span class="bg-white px-4 text-xs text-gray-400 uppercase tracking-wider">atau</span></div>
    </div>

    <!-- Register Link -->
    <div class="text-center">
        <p class="text-sm text-gray-500 mb-2">Belum punya akun?</p>
        <a href="{{ route('register') }}" class="inline-flex items-center justify-center w-full px-6 py-3 border-2 border-[#0A261F] text-[#0A261F] font-bold text-sm uppercase tracking-wider rounded-xl hover:bg-[#0A261F] hover:text-white transition duration-200">
            {{ __('Daftar Sekarang') }}
        </a>
    </div>
</x-guest-layout>
