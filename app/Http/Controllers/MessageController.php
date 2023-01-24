<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function message(MessageRequest $req){
        Message::create($req->all());
        $subject=$req->name;
        $email=$req->email;
        $body=$req->message;
        $phone=$req->phone;
        $surname=$req->surname;
        Mail::send ("front.mail", ['body'=> $body,'subject'=>$subject,'email'=>$email,'phone'=>$phone,'surname'=>$surname], function ($message) use ($email,$subject) {
            $message->to(env('MAIL_USERNAME'))->subject ($subject);
        });
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
    // public function mail(MessageRequest $req){
    //     $body=$req->subject;
    //     $email=$req->email;
    //     $subject=$req->message;
    //     Mail::send ("mail.index", ['body'=> $body], function ($message) use ($email,$subject) {
    //         $message->to($email)->subject ($subject);
    //         return redirect()->back();
    // });
// }
}
