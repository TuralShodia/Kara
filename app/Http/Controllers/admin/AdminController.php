<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        return view('admin/dashboard');
    }
    public function profile(){
        return view('admin/profile');
    }
}
