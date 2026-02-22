<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show All Users
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('Admin.users.index', compact('users'));
    }

    // View User
    public function show(User $user)
    {
        return view('Admin.users.show', compact('user'));
    }

    // Edit User
    public function edit(User $user)
    {
        return view('Admin.users.edit', compact('user'));
    }

    // Update User
    public function update(Request $request, User $user)
    {
        $user->update([
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'phone'            => $request->phone,
            'alternate_phone'  => $request->alternate_phone,
            'email'            => $request->email,
            'alternate_email'  => $request->alternate_email,
            'is_verified'      => $request->has('is_verified') ? 1 : 0,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success','User Updated Successfully');
    }

    // Delete User
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success','User Deleted Successfully');
    }
}