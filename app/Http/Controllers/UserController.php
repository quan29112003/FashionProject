<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameUser' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'email' => 'required|email|unique:users',
            'address' => 'nullable|string|max:255',
            'role' => 'required|integer',
        ]);

        $user = new User($request->all());
        if ($request->role == 0) {
            $user->type = 'khách hàng';
        } else {
            $user->type = 'nhân viên';
        }
        $user->save();

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nameUser' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'nullable|string|max:255',
            'role' => 'required|integer',
        ]);

        $user = User::find($id);
        $user->fill($request->all());
        if ($request->role == 0) {
            $user->type = 'khách hàng';
        } else {
            $user->type = 'nhân viên';
        }
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}





