<?php

namespace App\Http\Controllers\front;

use App\Models\{About, Book,News,Message};
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(){
        $news=News::skip(0)->take(2)->get();
        $books = Book::skip(0)->take(4)->get();
        // $books=Book::all();
        return view('front.index', compact('books','news'));
    }
    public function books(){
        $books=Book::all();
        return view('front.books',compact('books')); 
    }
    public function booksSingle($id){
        $book=Book::findOrFail($id);
        return view('front.book-single',compact('book'));
    }
    public function news(){
        $news=News::all();
        return view('front.news',compact('news')); 
    }
    public function message(){
        $messages=Message::all();
        return view('front.message',compact('messages')); 
    }
    public function about(){
        $about=About::first();
        return view('front.about',compact('about'));
    }
    // public function registersubmit(){
    //     $this->validate(request(), [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
        
    //     $user = User::create(request(['name', 'email', 'password']));
        
    //     auth()->login($user);
        
    //     return redirect()->route('dashboard');
//}
}
