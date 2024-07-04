<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameUser' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'email' => 'required|email|unique:users',
            'address' => 'nullable|string|max:255',
            'role' => 'required|integer|in:0,1,2',
            'password' => 'required|string|min:6',
        ]);

        $user = new User();
        $user->nameUser = $request->nameUser;
        $user->birthday = $request->birthday;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->role = $request->role;
    
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nameUser' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'nullable|string|max:255',
            'role' => 'required|integer|in:0,1,2',
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::find($id);
        $user->nameUser = $request->nameUser;
        $user->birthday = $request->birthday;
        $user->email = $request->email;
        $user->address = $request->address;
        if ($request->password) {
            $user->password = $request->password; // Lưu mật khẩu rõ ràng
        }
        $user->role = $request->role;
        
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
