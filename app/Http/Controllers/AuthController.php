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
        // $this->validate($request, [
        //     'name'=>'required',
        //     'password'=>'required'
        // ]);
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
    public function registersubmit(){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->route('dashboard');
    }
    public function read(){
        $users= User::latest()->paginate(5);
        return view('table');
    }


}


