<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 font-serif">Buat Akun Baru</h2>
        <p class="text-sm text-gray-600 mt-2">Bergabung dan nikmati koleksi Pre-Order eksklusif</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="{{ __('Nama Lengkap') }}" />
            <x-text-input id="name" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" value="{{ __('Alamat Email') }}" />
            <x-text-input id="email" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="{{ __('Kata Sandi') }}" />
            <x-text-input id="password" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="{{ __('Konfirmasi Kata Sandi') }}" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center bg-emerald-700 hover:bg-emerald-800 focus:bg-emerald-800 active:bg-emerald-900 focus:ring-emerald-500">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 text-center text-sm text-gray-600">
        {{ __('Sudah punya akun?') }}
        <a href="{{ route('login') }}" class="font-semibold text-emerald-600 hover:text-emerald-500 hover:underline">
            {{ __('Masuk di sini') }}
        </a>
    </div>
</x-guest-layout>
