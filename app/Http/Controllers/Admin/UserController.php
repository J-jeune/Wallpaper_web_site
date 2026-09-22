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
        return view('admin.users.index', ['users' => $users]);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = $request->has('is_admin');
        $user->save();

        return redirect('/admin/users');
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect('/admin/users');
    }
}