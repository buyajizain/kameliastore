<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 font-serif">Masuk ke Akun Anda</h2>
        <p class="text-sm text-gray-600 mt-2">Selamat datang kembali di Kamelia Store</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="{{ __('Alamat Email') }}" />
            <x-text-input id="email" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="{{ __('Kata Sandi') }}" />
            <x-text-input id="password" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-sm border-gray-300 text-emerald-600 shadow-sm focus:ring-emerald-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-emerald-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @else
                <div></div>
            @endif

            <x-primary-button class="bg-emerald-700 hover:bg-emerald-800 focus:bg-emerald-800 active:bg-emerald-900 focus:ring-emerald-500">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 text-center text-sm text-gray-600">
        {{ __('Belum punya akun?') }}
        <a href="{{ route('register') }}" class="font-semibold text-emerald-600 hover:text-emerald-500 hover:underline">
            {{ __('Daftar sekarang') }}
        </a>
    </div>
</x-guest-layout>
