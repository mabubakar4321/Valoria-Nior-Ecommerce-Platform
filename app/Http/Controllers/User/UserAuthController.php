<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;


class UserAuthController extends Controller
{
     public function showRegister()
    {
        return view('User.Auth.register');
    }

    public function showLogin()
    {
        return view('User.Auth.login');
    }

    public function showVerify()
    {
        return view('User.Auth.verify');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
        ], [
            'phone.regex' => 'Enter a valid number.',
            'password.regex' => 'Password must contain uppercase, lowercase, number and symbol.'
        ]);

        $code = rand(100000, 999999);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'alternate_phone' => $request->alternate_phone,
            'email' => $request->email,
            'alternate_email' => $request->alternate_email,
            'password' => Hash::make($request->password),
            'verification_code' => $code,
            'code_expires_at' => Carbon::now()->addMinute(),
        ]);

        Mail::raw("Your verification code is: $code", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Email Verification Code');
        });

        return redirect()->route('verify.form', [
    'email' => $user->email
]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required'
        ]);

        $user = User::where('email', $request->email)
            ->where('verification_code', $request->code)
            ->first();

        if (!$user) {
            return back()->withErrors(['code' => 'Invalid code']);
        }

        if (Carbon::now()->gt($user->code_expires_at)) {
            return back()->withErrors(['code' => 'Code expired']);
        }

        $user->update([
            'is_verified' => true,
            'verification_code' => null,
            'code_expires_at' => null,
        ]);

        Auth::login($user);

        return redirect('/userdashboard');
    }

    public function resendCode(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back();
        }

        $code = rand(100000, 999999);

        $user->update([
            'verification_code' => $code,
            'code_expires_at' => Carbon::now()->addMinute(),
        ]);

        Mail::raw("Your new verification code is: $code", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Resend Verification Code');
        });

        return back()->with('success', 'Code resent successfully.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        if (!$user->is_verified) {
            return redirect()->route('verify.form')
                ->with('email', $user->email);
        }

        Auth::login($user);

        return redirect('/userdashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/user/login');
    }

    public function showForgotForm()
{
    return view('User.Auth.forgot');
}

public function sendResetCode(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return redirect()->route('login.form');
    }

    $code = rand(100000, 999999);

    $user->update([
        'verification_code' => $code,
        'code_expires_at' => now()->addMinute(),
    ]);

    Mail::raw("Your new verification code is: $code", function ($message) use ($user) {
        $message->to($user->email)
                ->subject('Resend Verification Code');
    });

    // 🔥 IMPORTANT
    return redirect()->route('verify.form', [
        'email' => $user->email
    ]);
}

public function showResetForm()
{
    return view('User.Auth.reset');
}

public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'code' => 'required',
        'password' => [
            'required',
            'confirmed',
            'min:8',
            'regex:/[A-Z]/',
            'regex:/[a-z]/',
            'regex:/[0-9]/',
            'regex:/[@$!%*#?&]/'
        ],
    ]);

    $user = User::where('email', $request->email)
                ->where('reset_code', $request->code)
                ->first();

    if (!$user) {
        return back()->withErrors(['code' => 'Invalid code']);
    }

    if (now()->gt($user->reset_expires_at)) {
        return back()->withErrors(['code' => 'Code expired']);
    }

    $user->update([
        'password' => Hash::make($request->password),
        'reset_code' => null,
        'reset_expires_at' => null,
    ]);

    return redirect()->route('login.form')
            ->with('success', 'Password updated successfully.');
}

}
