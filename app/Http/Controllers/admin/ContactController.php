<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

            $contacts->address = $req->address;
            $contacts->phone = $req->phone;
            $contacts->phone2 = $req->phone2;
            $contacts->email = $req->email;
            $contacts->facebook_link = $req->facebook_link;
            $contacts->whatsapp_link = $req->whatsapp_link;
            $contacts->instagram_link = $req->instagram_link;
            $contacts->save();

            return redirect()->back()->with('success','updated successfully');
       
    }
    
}
