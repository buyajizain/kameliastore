<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 font-serif">Verifikasi Email Anda</h2>
        <p class="text-sm text-gray-600 mt-2">
            {{ __('Terima kasih telah mendaftar! Silakan verifikasi alamat email Anda dengan mengklik tautan yang telah kami kirimkan.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-emerald-600">
            {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
        </div>
    @endif

    <div class="mt-8 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <x-primary-button class="bg-emerald-700 hover:bg-emerald-800 focus:bg-emerald-800 active:bg-emerald-900 focus:ring-emerald-500">
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 hover:text-emerald-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                {{ __('Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
