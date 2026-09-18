<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 font-serif">Atur Ulang Password</h2>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="{{ __('Alamat Email') }}" />
            <x-text-input id="email" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="{{ __('Password Baru') }}" />
            <x-text-input id="password" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="{{ __('Konfirmasi Password Baru') }}" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full focus:ring-emerald-500 focus:border-emerald-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center bg-emerald-700 hover:bg-emerald-800 focus:bg-emerald-800 active:bg-emerald-900 focus:ring-emerald-500">
                {{ __('Simpan Password Baru') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
