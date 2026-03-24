<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // SEARCH
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('username', 'like', "%$search%");
            });
        }

        // FILTER ROLE
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $users = $query->latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,user',
            'status' => 'required|in:active,inactive',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone' => 'nullable|max:20',
            'address' => 'nullable|max:255',
        ]);

        $data = $request->except(['password', 'password_confirmation', 'avatar']);

        // HASH PASSWORD
        $data['password'] = Hash::make($request->password);

        // UPLOAD AVATAR
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // DEFAULT (AMAN)
        $data['role'] = $data['role'] ?? 'user';
        $data['status'] = $data['status'] ?? 'active';

        User::create($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'role' => 'required|in:admin,user',
            'status' => 'required|in:active,inactive',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone' => 'nullable|max:20',
            'address' => 'nullable|max:255',
        ]);

        $data = $request->except('avatar');

        // UPDATE PASSWORD (OPSIONAL)
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // UPDATE AVATAR
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        // CEGAH HAPUS DIRI SENDIRI
        if ($user->id == auth()->id()) {
            return back()->with('error', 'Tidak bisa hapus akun sendiri');
        }

        // HAPUS AVATAR
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:activate,deactivate,delete',
            'users' => 'required|array',
            'users.*' => 'exists:users,id'
        ]);

        $ids = array_diff($request->users, [auth()->id()]);

        if ($request->action == 'activate') {
            User::whereIn('id', $ids)->update(['status' => 'active']);
            $message = 'User diaktifkan';
        }

        if ($request->action == 'deactivate') {
            User::whereIn('id', $ids)->update(['status' => 'inactive']);
            $message = 'User dinonaktifkan';
        }

        if ($request->action == 'delete') {
            User::whereIn('id', $ids)->delete();
            $message = 'User dihapus';
        }

        return back()->with('success', $message);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.users.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone' => 'nullable|max:20',
            'address' => 'nullable|max:255',
            'bio' => 'nullable|max:500',
        ]);

        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.profile')
            ->with('success', 'Profile berhasil diupdate');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:8|confirmed',
        ]);

        auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('admin.profile')
            ->with('success', 'Password berhasil diganti');
    }
}