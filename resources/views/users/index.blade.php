<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-serif font-bold text-2xl text-gray-900 leading-tight flex items-center gap-2.5">
                    <span>👥 Manajemen & Pengaturan Pengguna</span>
                    <span class="text-xs font-sans font-bold px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">
                        {{ $stats['total'] }} Pengguna
                    </span>
                </h2>
                <p class="text-xs text-gray-500 mt-1 font-sans">
                    Kelola data pengguna, penetapan peran (Admin, Staff, Customer), dan hak akses sistem Kamelia Store.
                </p>
            </div>
            <div>
                <button @click="$dispatch('open-modal', 'add-user-modal')"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold bg-[#0A261F] text-[#C9A24D] hover:bg-[#14493D] transition shadow-md hover:shadow-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Pengguna Baru</span>
                </button>
            </div>
        </div>
    </x-slot>

    <div x-data="{
        selectedUser: { id: '', name: '', email: '', role: 'customer' },
        openEdit(user) {
            this.selectedUser = Object.assign({}, user);
            $dispatch('open-modal', 'edit-user-modal');
        },
        openDelete(user) {
            this.selectedUser = Object.assign({}, user);
            $dispatch('open-modal', 'delete-user-modal');
        }
    }" class="max-w-7xl mx-auto space-y-6">

        <!-- Flash Success Notification -->
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 flex items-center justify-between shadow-xs">
                <div class="flex items-center gap-3 text-sm font-medium">
                    <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center shrink-0">
                        ✓
                    </div>
                    <span>{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-emerald-700 hover:text-emerald-900 text-sm font-bold p-1">&times;</button>
            </div>
        @endif

        <!-- Flash Error Notification -->
        @if(session('error'))
            <div x-data="{ show: true }" x-show="show" x-transition class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-900 flex items-center justify-between shadow-xs">
                <div class="flex items-center gap-3 text-sm font-medium">
                    <div class="w-8 h-8 rounded-lg bg-rose-600 text-white flex items-center justify-center shrink-0">
                        ⚠️
                    </div>
                    <span>{{ session('error') }}</span>
                </div>
                <button @click="show = false" class="text-rose-700 hover:text-rose-900 text-sm font-bold p-1">&times;</button>
            </div>
        @endif

        <!-- Statistics Summary Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
            
            <!-- Total Pengguna -->
            <div class="bg-white p-3.5 sm:p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-3 sm:gap-4">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-gray-100 text-gray-700 flex items-center justify-center text-lg sm:text-xl shrink-0">
                    👥
                </div>
                <div class="min-w-0">
                    <div class="text-xl sm:text-2xl font-bold text-gray-900 font-serif truncate">{{ $stats['total'] }}</div>
                    <div class="text-[11px] sm:text-xs text-gray-500 font-medium truncate">Total Akun</div>
                </div>
            </div>

            <!-- Total Admin -->
            <div class="bg-white p-3.5 sm:p-5 rounded-2xl border border-amber-100 shadow-sm flex items-center gap-3 sm:gap-4">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center text-lg sm:text-xl shrink-0">
                    👑
                </div>
                <div class="min-w-0">
                    <div class="text-xl sm:text-2xl font-bold text-amber-900 font-serif truncate">{{ $stats['admin'] }}</div>
                    <div class="text-[11px] sm:text-xs text-amber-700 font-medium truncate">Admin</div>
                </div>
            </div>

            <!-- Total Staff -->
            <div class="bg-white p-3.5 sm:p-5 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-3 sm:gap-4">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-lg sm:text-xl shrink-0">
                    💬
                </div>
                <div class="min-w-0">
                    <div class="text-xl sm:text-2xl font-bold text-emerald-900 font-serif truncate">{{ $stats['staff'] }}</div>
                    <div class="text-[11px] sm:text-xs text-emerald-700 font-medium truncate">Staff CS</div>
                </div>
            </div>

            <!-- Total Customer -->
            <div class="bg-white p-3.5 sm:p-5 rounded-2xl border border-indigo-100 shadow-sm flex items-center gap-3 sm:gap-4">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center text-lg sm:text-xl shrink-0">
                    🌟
                </div>
                <div class="min-w-0">
                    <div class="text-xl sm:text-2xl font-bold text-indigo-900 font-serif truncate">{{ $stats['customer'] }}</div>
                    <div class="text-[11px] sm:text-xs text-indigo-700 font-medium truncate">Member VIP</div>
                </div>
            </div>

        </div>

        <!-- Filter & Search Toolbar -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
            
            <!-- Search Input Form -->
            <form method="GET" action="{{ route('users.index') }}" class="flex-1 max-w-md flex items-center gap-2">
                <div class="relative flex-1">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Cari nama atau email pengguna..." 
                           class="w-full pl-10 pr-4 py-2 text-xs border border-gray-200 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 text-gray-800">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <button type="submit" class="px-4 py-2 bg-emerald-800 text-white rounded-xl text-xs font-bold hover:bg-emerald-900 transition">
                    Cari
                </button>
                @if(request('search') || request('role'))
                    <a href="{{ route('users.index') }}" class="p-2 text-gray-400 hover:text-gray-700 text-xs" title="Reset Filter">
                        ✕
                    </a>
                @endif
            </form>

            <!-- Role Filter Pills -->
            <div class="flex items-center gap-2 overflow-x-auto pb-1 md:pb-0">
                <span class="text-xs text-gray-400 font-medium mr-1 hidden sm:inline">Role:</span>
                <a href="{{ route('users.index', array_merge(request()->except('role', 'page'), [])) }}" 
                   class="px-3 py-1.5 rounded-lg text-xs font-bold transition whitespace-nowrap {{ !request('role') ? 'bg-[#0A261F] text-[#C9A24D]' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    Semua
                </a>
                <a href="{{ route('users.index', array_merge(request()->except('page'), ['role' => 'admin'])) }}" 
                   class="px-3 py-1.5 rounded-lg text-xs font-bold transition whitespace-nowrap {{ request('role') === 'admin' ? 'bg-amber-600 text-white' : 'bg-amber-50 text-amber-800 hover:bg-amber-100' }}">
                    👑 Admin
                </a>
                <a href="{{ route('users.index', array_merge(request()->except('page'), ['role' => 'staff'])) }}" 
                   class="px-3 py-1.5 rounded-lg text-xs font-bold transition whitespace-nowrap {{ request('role') === 'staff' ? 'bg-emerald-600 text-white' : 'bg-emerald-50 text-emerald-800 hover:bg-emerald-100' }}">
                    💬 Staff
                </a>
                <a href="{{ route('users.index', array_merge(request()->except('page'), ['role' => 'customer'])) }}" 
                   class="px-3 py-1.5 rounded-lg text-xs font-bold transition whitespace-nowrap {{ request('role') === 'customer' ? 'bg-indigo-600 text-white' : 'bg-indigo-50 text-indigo-800 hover:bg-indigo-100' }}">
                    🌟 Customer
                </a>
            </div>

        </div>

        <!-- Users Table Card -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50/80 text-gray-500 font-semibold border-b border-gray-100 uppercase tracking-wider text-[10px]">
                        <tr>
                            <th class="px-6 py-4">Pengguna</th>
                            <th class="px-6 py-4">Role / Akses</th>
                            <th class="px-6 py-4">Terdaftar Sejak</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 font-sans">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50/50 transition">
                                <!-- User Info -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-emerald-900 text-[#C9A24D] font-serif font-bold text-sm flex items-center justify-center shrink-0 border border-[#C9A24D]/30 shadow-xs">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900 text-sm flex items-center gap-2">
                                                <span>{{ $user->name }}</span>
                                                @if($user->id === Auth::id())
                                                    <span class="px-1.5 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                                        Anda
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="text-gray-500 text-xs mt-0.5">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Role Badge -->
                                <td class="px-6 py-4">
                                    @if($user->isAdmin())
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-900 border border-amber-300">
                                            👑 Administrator
                                        </span>
                                    @elseif($user->isStaff())
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-900 border border-emerald-300">
                                            💬 Staff Concierge
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-indigo-100 text-indigo-900 border border-indigo-300">
                                            🌟 Member VIP
                                        </span>
                                    @endif
                                </td>

                                <!-- Registered Date -->
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <!-- Edit Button -->
                                        <button @click="openEdit({{ json_encode(['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'role' => $user->role]) }})"
                                                class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gray-100 text-gray-700 hover:bg-emerald-50 hover:text-emerald-800 transition">
                                            ✏️ Edit
                                        </button>

                                        <!-- Delete Button -->
                                        @if($user->id !== Auth::id())
                                            <button @click="openDelete({{ json_encode(['id' => $user->id, 'name' => $user->name]) }})"
                                                    class="px-3 py-1.5 rounded-lg text-xs font-bold bg-rose-50 text-rose-700 hover:bg-rose-100 transition">
                                                🗑️ Hapus
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                    Tidak ada pengguna yang sesuai dengan kriteria pencarian.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            @if($users->hasPages())
                <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $users->links() }}
                </div>
            @endif
        </div>

        <!-- ================= MODAL TAMBAH PENGGUNA ================= -->
        <x-modal name="add-user-modal" focusable>
            <form method="POST" action="{{ route('users.store') }}" class="p-6 sm:p-8">
                @csrf
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-6">
                    <div>
                        <h3 class="font-serif font-bold text-xl text-gray-900">Tambah Pengguna Baru</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Daftarkan akun baru ke dalam sistem Kamelia Store</p>
                    </div>
                    <button type="button" @click="$dispatch('close')" class="text-gray-400 hover:text-gray-600 text-lg font-bold">
                        &times;
                    </button>
                </div>

                <div class="space-y-4">
                    <div>
                        <x-input-label for="add_name" value="Nama Lengkap" />
                        <x-text-input id="add_name" name="name" type="text" class="mt-1 block w-full text-sm" placeholder="Contoh: Siti Rahmawati" required />
                    </div>

                    <div>
                        <x-input-label for="add_email" value="Alamat Email" />
                        <x-text-input id="add_email" name="email" type="email" class="mt-1 block w-full text-sm" placeholder="nama@kameliastore.com" required />
                    </div>

                    <div>
                        <x-input-label for="add_role" value="Role / Hak Akses" />
                        <select id="add_role" name="role" class="mt-1 block w-full rounded-lg border-gray-300 text-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                            <option value="customer">🌟 Member VIP / Customer</option>
                            <option value="staff">💬 Staff Concierge</option>
                            <option value="admin">👑 Administrator (Owner)</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="add_password" value="Kata Sandi (Password)" />
                        <x-text-input id="add_password" name="password" type="password" class="mt-1 block w-full text-sm" placeholder="Minimal 8 karakter" required />
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <x-secondary-button type="button" @click="$dispatch('close')">
                        Batal
                    </x-secondary-button>
                    <x-primary-button class="bg-emerald-800 hover:bg-emerald-900">
                        Simpan Pengguna
                    </x-primary-button>
                </div>
            </form>
        </x-modal>

        <!-- ================= MODAL EDIT PENGGUNA ================= -->
        <x-modal name="edit-user-modal" focusable>
            <form method="POST" :action="'{{ url('users') }}/' + selectedUser.id" class="p-6 sm:p-8">
                @csrf
                @method('PUT')
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-6">
                    <div>
                        <h3 class="font-serif font-bold text-xl text-gray-900">Edit Data Pengguna</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Perbarui nama, email, role, atau ubah password pengguna</p>
                    </div>
                    <button type="button" @click="$dispatch('close')" class="text-gray-400 hover:text-gray-600 text-lg font-bold">
                        &times;
                    </button>
                </div>

                <div class="space-y-4">
                    <div>
                        <x-input-label for="edit_name" value="Nama Lengkap" />
                        <x-text-input id="edit_name" name="name" type="text" x-model="selectedUser.name" class="mt-1 block w-full text-sm" required />
                    </div>

                    <div>
                        <x-input-label for="edit_email" value="Alamat Email" />
                        <x-text-input id="edit_email" name="email" type="email" x-model="selectedUser.email" class="mt-1 block w-full text-sm" required />
                    </div>

                    <div>
                        <x-input-label for="edit_role" value="Role / Hak Akses" />
                        <select id="edit_role" name="role" x-model="selectedUser.role" class="mt-1 block w-full rounded-lg border-gray-300 text-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                            <option value="customer">🌟 Member VIP / Customer</option>
                            <option value="staff">💬 Staff Concierge</option>
                            <option value="admin">👑 Administrator (Owner)</option>
                        </select>
                    </div>

                    <div class="pt-2 border-t border-gray-100">
                        <x-input-label for="edit_password" value="Password Baru (Kosongkan jika tidak ingin diubah)" />
                        <x-text-input id="edit_password" name="password" type="password" class="mt-1 block w-full text-sm" placeholder="Masukkan password baru jika ingin mengubah" />
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <x-secondary-button type="button" @click="$dispatch('close')">
                        Batal
                    </x-secondary-button>
                    <x-primary-button class="bg-emerald-800 hover:bg-emerald-900">
                        Simpan Perubahan
                    </x-primary-button>
                </div>
            </form>
        </x-modal>

        <!-- ================= MODAL HAPUS PENGGUNA ================= -->
        <x-modal name="delete-user-modal" focusable>
            <form method="POST" :action="'{{ url('users') }}/' + selectedUser.id" class="p-6 sm:p-8">
                @csrf
                @method('DELETE')
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-rose-100 text-rose-700 flex items-center justify-center text-xl shrink-0">
                        🗑️
                    </div>
                    <div>
                        <h3 class="font-serif font-bold text-xl text-gray-900">Konfirmasi Hapus Pengguna</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Tindakan ini tidak dapat dibatalkan</p>
                    </div>
                </div>

                <p class="text-sm text-gray-600 leading-relaxed">
                    Apakah Anda yakin ingin menghapus akun pengguna <strong class="text-gray-900 font-bold" x-text="selectedUser.name"></strong>? Seluruh hak akses dan data terkait akun ini akan dihapus secara permanen.
                </p>

                <div class="mt-8 flex justify-end gap-3">
                    <x-secondary-button type="button" @click="$dispatch('close')">
                        Batal
                    </x-secondary-button>
                    <x-danger-button>
                        Ya, Hapus Pengguna
                    </x-danger-button>
                </div>
            </form>
        </x-modal>

    </div>
</x-app-layout>
