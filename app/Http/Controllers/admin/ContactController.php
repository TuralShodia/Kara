<?php

namespace App\Http\Controllers\admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ContactController extends Controller
{
    public function index()
    {
        $contact=Contact::first();
        return view('admin/contact',compact('contact'));
    }
    public function update(Request $req,$id){
        
        $data=$req->all();
        $validator=Validator::make($data,[
            'phone'=>'required',
            'phone2'=>'required',
            'address'=>'required',
            'email'=>'required',
            'facebook_link'=>'required',
            'whatsapp_link'=>'required',
            'instagram_link'=>'required',
    
        ]);
        

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);

        }
        
        $contacts = Contact::find($id);
            $contacts->update($req->all());
            return redirect()->back()->with('success','updated successfully');
       
    }
    
}
