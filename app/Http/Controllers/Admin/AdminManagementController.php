<?php
// app/Http/Controllers/Admin/AdminManagementController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminManagementController extends Controller
{
    // HAPUS constructor ini!
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'superadmin']);
    // }

    /**
     * Display a listing of admins
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'admin');
        
        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('username', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        
        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $admins = $query->latest()->paginate(10)->withQueryString();
        
        $stats = [
            'total' => User::where('role', 'admin')->count(),
            'active' => User::where('role', 'admin')->where('status', 'active')->count(),
            'inactive' => User::where('role', 'admin')->where('status', 'inactive')->count(),
        ];
        
        return view('admin.admin-management.index', compact('admins', 'stats'));
    }

    /**
     * Show form to create new admin
     */
    public function create()
    {
        return view('admin.admin-management.create');
    }

    /**
     * Store new admin
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'status' => 'sometimes|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $admin = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin',
                'status' => $request->status ?? 'active',
                'phone' => $request->phone,
                'address' => $request->address,
                'email_verified_at' => now(),
            ]);

            return redirect()->route('admin.admin-management.index')
                ->with('success', "Admin '{$admin->name}' berhasil ditambahkan! Password: {$request->password}");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan admin: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show admin detail
     */
    public function show($id)
    {
        $admin = User::where('role', 'admin')->findOrFail($id);
        return view('admin.admin-management.show', compact('admin'));
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $admin = User::where('role', 'admin')->findOrFail($id);
        return view('admin.admin-management.edit', compact('admin'));
    }

    /**
     * Update admin
     */
    public function update(Request $request, $id)
    {
        $admin = User::where('role', 'admin')->findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($admin->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($admin->id)],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'status' => 'required|in:active,inactive',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $admin->name = $request->name;
            $admin->username = $request->username;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->address = $request->address;
            $admin->status = $request->status;
            
            if ($request->filled('password')) {
                $admin->password = Hash::make($request->password);
            }
            
            $admin->save();

            $message = "Admin '{$admin->name}' berhasil diperbarui.";
            if ($request->filled('password')) {
                $message .= " Password baru: {$request->password}";
            }

            return redirect()->route('admin.admin-management.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal mengupdate admin: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete admin
     */
    public function destroy($id)
    {
        try {
            $admin = User::where('role', 'admin')->findOrFail($id);
            
            $adminName = $admin->name;
            $admin->delete();
            
            return redirect()->route('admin.admin-management.index')
                ->with('success', "Admin '{$adminName}' berhasil dihapus.");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus admin: ' . $e->getMessage());
        }
    }

    /**
     * Toggle admin status
     */
    public function toggleStatus($id)
    {
        try {
            $admin = User::where('role', 'admin')->findOrFail($id);
            
            $admin->status = $admin->status === 'active' ? 'inactive' : 'active';
            $admin->save();
            
            $statusText = $admin->status === 'active' ? 'diaktifkan' : 'dinonaktifkan';
            
            return redirect()->back()
                ->with('success', "Admin '{$admin->name}' berhasil {$statusText}.");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal mengubah status admin: ' . $e->getMessage());
        }
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:users,id',
            'action' => 'required|in:activate,deactivate,delete',
        ]);

        $admins = User::whereIn('id', $request->ids)
            ->where('role', 'admin')
            ->get();

        $count = 0;
        $errors = [];

        foreach ($admins as $admin) {
            try {
                if ($request->action === 'activate') {
                    $admin->status = 'active';
                    $admin->save();
                    $count++;
                } elseif ($request->action === 'deactivate') {
                    $admin->status = 'inactive';
                    $admin->save();
                    $count++;
                } elseif ($request->action === 'delete') {
                    $admin->delete();
                    $count++;
                }
            } catch (\Exception $e) {
                $errors[] = $admin->name . ': ' . $e->getMessage();
            }
        }

        $actionText = [
            'activate' => 'diaktifkan',
            'deactivate' => 'dinonaktifkan',
            'delete' => 'dihapus'
        ];

        $message = "{$count} admin berhasil {$actionText[$request->action]}.";
        if (!empty($errors)) {
            $message .= ' Error: ' . implode(', ', $errors);
        }

        return redirect()->route('admin.admin-management.index')
            ->with('success', $message);
    }
}