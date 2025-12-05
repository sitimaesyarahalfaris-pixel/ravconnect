<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // Protect admin user management actions
        $this->middleware('auth')->only(['index', 'show', 'store', 'update', 'destroy']);
        $this->middleware(\App\Http\Middleware\AdminAuthMiddleware::class)->only(['index', 'show', 'store', 'update', 'destroy']);
    }
    // List all users
    public function index()
    {
        $users = \App\Models\User::withCount('orders')->orderBy('created_at', 'desc')->paginate(20);
        if (request()->wantsJson()) {
            return response()->json($users);
        }
        return view('admin.users.index', compact('users'));
    }

    // Store a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return response()->json($user, 201);
    }

    // Show a single user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Edit a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Update a user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);
        if (array_key_exists('password', $validated) && $validated['password'] !== null && $validated['password'] !== '') {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); // Prevent setting password to null
        }
        $user->update($validated);
        return redirect()->back()->with('success', 'User updated successfully');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }

    // Show user's assigned eSIMs
    public function myEsim()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }
        $orders = Order::where('user_id', Auth::id())
            ->whereNotNull('esim_stock_id')
            ->with('esimStock.product')
            ->orderByDesc('created_at')
            ->get();
        return view('my_esim', [
            'orders' => $orders,
            'esims' => $orders->map->esimStock,
        ]);
    }

    // Show bank info management page for authenticated user
    public function bankInfos()
    {
        $bankInfos = Auth::user()->bankInfos()->get();
        return view('user.bank_infos', compact('bankInfos'));
    }

    public function toggleAdmin(Request $request, \App\Models\User $user)
    {
        // Prevent self-modification
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot modify your own admin status.');
        }
        $user->is_admin = !$user->is_admin;
        $user->save();
        return redirect()->back()->with('success', 'User admin status updated.');
    }
}
