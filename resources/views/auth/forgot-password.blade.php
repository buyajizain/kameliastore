<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 font-serif">Lupa Password?</h2>
        <p class="text-sm text-gray-600 mt-2">
            {{ __('Masukkan alamat email Anda dan kami akan mengirimkan tautan untuk mengatur ulang password.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="{{ __('Alamat Email') }}" />
            <x-text-input id="email" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center bg-emerald-700 hover:bg-emerald-800 focus:bg-emerald-800 active:bg-emerald-900 focus:ring-emerald-500">
                {{ __('Kirim Tautan Reset Password') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 text-center">
        <a href="{{ route('login') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-500 hover:underline">
            {{ __('Kembali ke halaman Masuk') }}
        </a>
    </div>
</x-guest-layout>
