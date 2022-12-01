<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('admin/profile/profile');
    }
    public function update(Request $req){
        
        $data=[
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>$req->password,
        ];
        $validator=Validator::make($data,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'',
        ]);
        

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        
        $user = Auth::user();
            $user->password = $req->password;
            $user->email = $req->email;
            $user->name = $req->name;
            $user->save();

            return redirect()->back()->with('success','updated successfully');
    }
}
