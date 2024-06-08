<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $users = User::find($id);
        if (!$users) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return response()->json(
            [
                'users' => $users
            ],
            200
        );
    }

    public function update(Request $request, $id)
    {
        // Tìm người dùng theo ID
        $user = User::findOrFail($id);
    
        // Xác thực yêu cầu, chỉ cho phép các trường 'role' và 'type'
        $request->validate([
            'role' => 'required|string',
            'type' => 'required|string',
        ]);
    
        // Cập nhật trường 'role' và 'type'
        $user->update($request->only(['role', 'type']));
    
        // Trả về phản hồi JSON với dữ liệu người dùng được cập nhật
        return response()->json($user, 200);
    }

}
