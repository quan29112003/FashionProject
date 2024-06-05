<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPointController extends Controller
{
    public function index()
    {
        $points = Point::with('user')->get();
        return view('admin.points.index', compact('points'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.points.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'points' => 'required|integer',
        ]);

        // Tìm hoặc tạo người dùng mới
        $user = User::firstOrCreate(
            ['name' => $request->input('name')],
            ['created_at' => now(), 'updated_at' => now()]
        );

        // Tạo điểm tích lũy cho người dùng
        Point::create([
            'user_id' => $user->id,
            'points' => $request->input('points'),
        ]);

        return redirect()->route('admin.points.index')->with('success', 'Điểm tích lũy đã được tạo thành công.');
    }
    public function edit(Point $point)
    {
        $users = User::all();
        return view('admin.points.edit', compact('point', 'users'));
    }

    public function update(Request $request, Point $point)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'points' => 'required|integer',
        ]);

        $point->update($request->all());
        return redirect()->route('admin.points.index')->with('success', 'Điểm tích lũy đã được cập nhật thành công.');
    }

    public function destroy(Point $point)
    {
        $point->delete();
        return redirect()->route('admin.points.index')->with('success', 'Điểm tích lũy đã được xóa thành công.');
    }
}
