<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;


class ProfileController extends Controller
{

    public function index()
    {
        return view('admin/profile/profile');
    }
    public function update(ProfileRequest $req){
        
        $user = Auth::user();
        if($req->password){
            $user->password = Hash::make($req->password);
        }
            $user->email = $req->email;
            $user->name = $req->name;
            $user->save();

            return redirect()->back()->with('success','updated successfully');
    }
}
