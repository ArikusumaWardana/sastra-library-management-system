<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('pages.user.user', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|string|min:8',
            'role' => ['required', Rule::in(['superadmin', 'admin', 'staff'])],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('users')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => ['required', Rule::in(['superadmin', 'admin', 'staff'])],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        $updateData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
        ];

        // Only update password if it's provided
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);
        
        return redirect()->route('users')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return redirect()->route('users')->with('success', 'User deleted successfully');
    }

}
