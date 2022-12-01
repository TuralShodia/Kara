<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function frontmessage(Request $req){
        $data=$req->all();
        $validator=Validator::make($data,[
            'name'=>'required',
            'surname'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);

        }
        Message::create($data);
        return redirect()->route('contact');
    }public function message(){
        $messages=Message::all();
        return view('admin/message',compact('messages'));
    }
    public function delete($id)
    {
        $message=Message::findOrFail($id);
        $message->delete();
    return redirect()->route('message');
}
}
