<?php

namespace App\Http\Controllers\UserDashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class userDashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $user = Auth::user();

        return view('User.dashboard.index', compact('user'));
    }
}
