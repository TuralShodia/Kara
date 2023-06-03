<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{About, Book, Category, News,Message, Slider, Testimonial};

class FrontController extends Controller
{
    public function index(){
        $about=About::first();
        $news=News::skip(0)->take(2)->get();
        $books = Book::skip(0)->take(4)->get();
        $sliders = Slider::query()->get();
        $testimonials = Testimonial::query()->get();

        return view('front.index', compact('books','news','about','sliders','testimonials'));
    }
    public function books(){
        $books=Book::all();
        $categories = Category::query()->get();

        return view('front.books',compact('books','categories')); 
    }

    public function category($id){
        $books=Book::query()->where('category_id','=',$id)->get();
        $categories = Category::query()->get();

        return view('front.books',compact('books','categories')); 
    }
    public function booksSingle($id){
        $book=Book::findOrFail($id);
        return view('front.book-single',compact('book'));
    }
    public function news(){
        $news=News::all();
        return view('front.news',compact('news')); 
    } 
    public function newsSingle($id){
        $news=News::findOrFail($id);
        return view('front.news-single',compact('news'));
    }
    public function message(){
        $messages=Message::all();
        return view('front.message',compact('messages')); 
    }
    public function about(){
        $about=About::first();
        return view('front.about',compact('about'));
    }
    public function search(Request $request)
    {
        $books = Book::where('books.name', 'like', '%'.trim($request->search).'%')
            ->orWhere('writer', 'like', '%'.trim($request->search).'%')
            ->orWhere('language', 'like', '%'.trim($request->search).'%')
            ->orWhere('year', 'like', '%'.trim($request->search).'%')
            ->get();
        $categories = Category::query()->get();

        return view('front.books', compact('books','categories'));
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
