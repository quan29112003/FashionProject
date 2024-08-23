<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = 'Đang hoạt động'; 

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
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function toggleLock($id)
    {
        $user = User::find($id);
        if ($user->status === 'Đang hoạt động') {
            $user->status = 'Khóa tạm thời';
        } elseif ($user->status === 'Khóa tạm thời') {
            $user->status = 'Đang hoạt động';
        } elseif ($user->status === 'Khóa vĩnh viễn') {
            $user->status = 'Khóa vĩnh viễn';
        }
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'User status updated successfully.');
    }

    public function permanentLock($id)
    {
        $user = User::find($id);
        $user->status = 'Khóa vĩnh viễn';
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'User permanently locked.');
    }
}
