<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index()
    {
        return view('admin/profile/profile');
    }
    public function update(Request $req){
        
        
        $validator=Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'',
        ]);
        

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        
        $user = Auth::user();
        if($req->password){
            $user->password = $req->password;
        }
            $user->email = $req->email;
            $user->name = $req->name;
            $user->save();

            return redirect()->back()->with('success','updated successfully');
    }
}
