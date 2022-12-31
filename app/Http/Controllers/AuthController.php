<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function index(){
        return view('auth/login');
    }  
    public function login(LoginRequest $req){
        $auth=!Auth::attempt($req->only(['name','password'])) ;
        if($auth) {
            return redirect()->back()->with('danger','name or password incorrect');
        }

        return redirect()->route('dashboard');  

    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login');
       }
    public function register(){
        return view('auth/register');
    }  
  
    public function read(){
        $users= User::latest()->paginate(5);
        return view('table');
    }


}


