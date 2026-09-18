<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <div>
                <h2 class="text-2xl font-serif font-bold text-gray-900 leading-tight">
                    {{ __('Pengaturan Akun') }}
                </h2>
                <p class="text-xs text-gray-500 mt-1 font-sans">
                    Kelola profil, keamanan kata sandi, dan privasi akun Anda
                </p>
            </div>
            <span class="px-3 py-1 text-xs font-bold rounded-full {{ Auth::user()->role === 'admin' ? 'bg-amber-100 text-amber-800 border border-amber-300' : (Auth::user()->role === 'staff' ? 'bg-emerald-100 text-emerald-800 border border-emerald-300' : 'bg-indigo-100 text-indigo-800 border border-indigo-300') }}">
                {{ Auth::user()->role_label ?? ucfirst(Auth::user()->role) }}
            </span>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        
        <!-- Profile Info Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 bg-gray-50/70 px-6 py-4">
                <h3 class="font-serif font-bold text-gray-900 text-base">Informasi Profil</h3>
                <p class="text-xs text-gray-500 mt-0.5">Perbarui nama dan alamat email akun terdaftar Anda</p>
            </div>
            <div class="p-6 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <!-- Password Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 bg-gray-50/70 px-6 py-4">
                <h3 class="font-serif font-bold text-gray-900 text-base">Keamanan & Kata Sandi</h3>
                <p class="text-xs text-gray-500 mt-0.5">Pastikan akun Anda menggunakan password yang kuat dan aman</p>
            </div>
            <div class="p-6 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <!-- Delete Account Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-red-100 overflow-hidden">
            <div class="border-b border-red-100 bg-red-50/70 px-6 py-4">
                <h3 class="font-serif font-bold text-red-900 text-base">Zona Berbahaya</h3>
                <p class="text-xs text-red-500 mt-0.5">Hapus seluruh data akun secara permanen dari sistem</p>
            </div>
            <div class="p-6 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
