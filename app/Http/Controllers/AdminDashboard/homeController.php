<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function MainDashboard(){
       
        return view('Admin.Dashbaord.main',);
    }
}
