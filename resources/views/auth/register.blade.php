<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-[#0A261F] font-serif tracking-tight">Buat Akun Baru</h2>
        <p class="text-sm text-gray-500 mt-1.5">Bergabung dan nikmati koleksi Pre-Order eksklusif</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Anti-bot Honeypot (Hidden from real users) -->
        <div class="hidden" style="display: none !important;" aria-hidden="true">
            <label for="preferred_contact_method">Leave this empty</label>
            <input type="text" name="preferred_contact_method" id="preferred_contact_method" tabindex="-1" autocomplete="off">
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-[#0A261F] mb-1.5">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 transition duration-200"
                   placeholder="Masukkan nama lengkap" />
            <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-[#0A261F] mb-1.5">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 transition duration-200"
                   placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-[#0A261F] mb-1.5">Kata Sandi</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 transition duration-200"
                   placeholder="Buat kata sandi" />
            <p class="text-xs text-gray-400 mt-1.5 flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Minimal 8 karakter (kombinasi huruf & angka)
            </p>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-[#0A261F] mb-1.5">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 transition duration-200"
                   placeholder="Ulangi kata sandi" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5" />
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-[#0A261F] text-white font-bold text-sm uppercase tracking-wider rounded-xl hover:bg-[#0E352B] focus:outline-none focus:ring-2 focus:ring-[#0A261F]/50 focus:ring-offset-2 active:bg-[#071a15] transition duration-200 shadow-lg shadow-emerald-900/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            {{ __('Daftar Sekarang') }}
        </button>
    </form>

    <!-- Divider -->
    <div class="relative my-8">
        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-200"></div></div>
        <div class="relative flex justify-center"><span class="bg-white px-4 text-xs text-gray-400 uppercase tracking-wider">atau</span></div>
    </div>

    <!-- Login Link -->
    <div class="text-center">
        <p class="text-sm text-gray-500 mb-2">Sudah punya akun?</p>
        <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full px-6 py-3 border-2 border-[#0A261F] text-[#0A261F] font-bold text-sm uppercase tracking-wider rounded-xl hover:bg-[#0A261F] hover:text-white transition duration-200">
            {{ __('Masuk di Sini') }}
        </a>
    </div>
</x-guest-layout>
