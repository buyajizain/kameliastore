<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Search by name or email
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by role
        if ($role = $request->input('role')) {
            if ($role === 'admin') {
                $query->whereIn('role', ['admin', 'super_admin', 'super admin', 'Owner']);
            } elseif ($role === 'staff') {
                $query->whereIn('role', ['staff', 'concierge']);
            } elseif ($role === 'customer') {
                $query->whereIn('role', ['customer', 'user', 'member']);
            }
        }

        $users = $query->latest()->paginate(10)->withQueryString();

        // User statistics
        $stats = [
            'total' => User::count(),
            'admin' => User::whereIn('role', ['admin', 'super_admin', 'super admin', 'Owner'])->count(),
            'staff' => User::whereIn('role', ['staff', 'concierge'])->count(),
            'customer' => User::whereIn('role', ['customer', 'user', 'member'])->orWhereNull('role')->count(),
        ];

        return view('users.index', compact('users', 'stats'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string', Rule::in(['admin', 'staff', 'customer'])],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna baru berhasil ditambahkan ke sistem.');
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'role' => ['required', 'string', Rule::in(['admin', 'staff', 'customer'])],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        // Prevent self-demotion if currently the logged in user
        if ($user->id === Auth::id() && $request->role !== 'admin' && $user->isAdmin()) {
            return redirect()->route('users.index')->with('error', 'Anda tidak dapat mengubah role akun Administrator Anda sendiri.');
        }

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('users.index')->with('success', 'Data pengguna "' . $user->name . '" berhasil diperbarui.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // Prevent deleting own account
        if ($user->id === Auth::id()) {
            return redirect()->route('users.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri dari sini.');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna "' . $userName . '" berhasil dihapus dari sistem.');
    }
}
