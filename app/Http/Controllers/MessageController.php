<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function message(MessageRequest $req){
        Message::create($req->all());
        return redirect()->back()->with('success','Message Sent Successfully');
    }public function index(){
        $messages=Message::all();
        return view('admin/message',compact('messages'));
    }
    public function delete($id)
    {
        $message=Message::findOrFail($id);
        $message->delete();
    return redirect()->route('message')->with('success','Message Deleted Successfully');
}
}
