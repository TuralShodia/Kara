<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function edit()
    {
        $contact=Contact::first();
        return view('admin/contact',compact('contact'));
    }
    public function update(Request $req,$id){
        
        $data=[
            'phone'=>$req->phone,
            'phone2'=>$req->phone2,
            'address'=>$req->address,
            'email'=>$req->email,
            'facebook_link'=>$req->facebook_link,
            'whatsapp_link'=>$req->whatsapp_link,
            'instagram_link'=>$req->instagram_link,
        ];
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
            return 'sehv';
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
