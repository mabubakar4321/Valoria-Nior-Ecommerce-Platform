<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
        //  dd(config('services.google'));
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $admin = Admin::updateOrCreate(
            ['email' => $googleUser->email],
            [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
            ]
        );

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }
}
