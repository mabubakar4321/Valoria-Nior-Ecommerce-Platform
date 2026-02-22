<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\AdminResetCodeMail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('Admin.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Admin registered');
    }

    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();

        // ✅ CORRECT REDIRECT
       return to_route('admin.dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials',
    ]);
}

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }


    public function showForgotForm()
{
    return view('admin.auth.forgot');
}
public function sendResetCode(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:admins,email'
    ]);

    $code = rand(100000, 999999);

    DB::table('admin_password_resets')->updateOrInsert(
        ['email' => $request->email],
        [
            'token' => Hash::make($code),
            'created_at' => Carbon::now()
        ]
    );

    Mail::to($request->email)->send(new AdminResetCodeMail($code));

    return redirect()->route('admin.password.reset')
        ->with('email', $request->email);
}
public function showResetForm()
{
    return view('admin.auth.reset');
}

public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'code' => 'required',
        'password' => 'required|confirmed|min:6'
    ]);

    $record = DB::table('admin_password_resets')
        ->where('email', $request->email)
        ->first();

    if (!$record) {
        return back()->withErrors(['code' => 'Invalid code']);
    }

    // Expire after 10 minutes
    if (Carbon::parse($record->created_at)->addMinutes(10)->isPast()) {
        return back()->withErrors(['code' => 'Code expired']);
    }

    if (!Hash::check($request->code, $record->token)) {
        return back()->withErrors(['code' => 'Invalid code']);
    }

    DB::table('admins')
        ->where('email', $request->email)
        ->update([
            'password' => Hash::make($request->password)
        ]);

    DB::table('admin_password_resets')
        ->where('email', $request->email)
        ->delete();

    return redirect()->route('admin.login')
        ->with('success', 'Password updated successfully.');
}
   public function profile()
{
    $admin = Auth::guard('admin')->user();

    return view('admin.profile.index', compact('admin'));
}



}