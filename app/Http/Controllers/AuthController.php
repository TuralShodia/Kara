<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function index(){
        return view('auth/login');
    }  
    public function login(LoginRequest $req){
        $auth = !Auth::attempt([
            "name" => $req->name , 
            "password" => $req->password,
            'role_id'=>function( $query){
            $query->where('role_id',0);
            }
         ]);
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
  



}


