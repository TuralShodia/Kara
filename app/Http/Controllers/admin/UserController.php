<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function index(){
        $users= User::where('role_id',1)->get();
        return view('admin/user/index',compact('users'));
    }
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('admin/user/update',compact('user'));
    }
    public function update($id, UserRequest $req){

        $user = User::find($id);
        try {
            $user->update([
                'name'=>$req->name,
                'email'=>$req->email,
                'password'=>Hash::make($req->password)
            ]);
            return redirect()->back()->with('success','updated successfully');
        } catch (Throwable $e) {
            report($e);
            return $e->getMessage();
        }
    }
    public function delete($id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success','User Deleted Successfully');;
    }
    public function login(){
        return view('front/user/login');
    }  
    public function loginSubmit(LoginRequest $req){
        $auth=!Auth::attempt(
            ["name" => $req->name , 
            "password" => $req->password,
            'role_id'=>function( $query){
                $query->where('role_id',1);
               }
         ]);
         
        if($auth) {
            return redirect()->back()->with('danger','name or password incorrect');
        }
        return redirect()->route('home');  
    }
    public function register(){
        return view('front/user/register');
    }  
    public function registerSubmit(RegisterRequest $req){
        $data=$req->only(['name','email','role_id']);
        $data['password']=Hash::make($req->password);
        User::create($data);
        return redirect('/home')->with('success','Registered Successfully');

    }  
    public function logout(){
        auth()->logout();
        return redirect()->route('home');
       }
}
