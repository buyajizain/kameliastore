<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 font-serif">Konfirmasi Password</h2>
        <p class="text-sm text-gray-600 mt-2">
            {{ __('Ini adalah area yang dilindungi. Silakan konfirmasi password Anda sebelum melanjutkan.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" value="{{ __('Kata Sandi') }}" />
            <x-text-input id="password" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-6">
            <x-primary-button class="bg-emerald-700 hover:bg-emerald-800 focus:bg-emerald-800 active:bg-emerald-900 focus:ring-emerald-500">
                {{ __('Konfirmasi') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
