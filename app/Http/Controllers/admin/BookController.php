<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\{Book,Category};
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(){
        $categories=Category::orderBy('id')->select(['id','name'])->get();
        $books= Book::all();
        return view('admin/books/index',compact('books','categories'));
    }  

    public function store(BookRequest $req)
    {
       $data=$req->all();
       if($req->hasFile('image')){
        $ext=$req->image->extension();
        $filename=rand(1,100).time().'.'. $ext ;
        $fileNamewithUpload = "book/".$filename;
        $req->image->move('book'  , $filename);
        $data['image'] = $fileNamewithUpload;
        }else{
            return redirect()->back()->with('errors');
        }
        try {
            Book::create($data);
            return redirect()->back();
        }catch (Throwable $e) {
            report($e);
            return false;
            }
        
        return redirect()->back();
    }
    
public function edit($id)
{
    $book=Book::findOrFail($id);
    $categories=Category::all();

    return view('admin/books/update',compact('book','categories'));
}

public function update($id, BookRequest $req)
{
    $data=$req->all();
    $books=Book::findOrFail($id);

 
   try {   
    if($req->hasFile('image')){
        $ext=$req->image->extension();
        $filename=rand(1,100).time().'.'. $ext ;
        $fileNamewithUpload = "book/".$filename;
        $req->image->move('book'  , $filename);
        $data['image']=$fileNamewithUpload;
        // if(File::exists($books->image))
        // {
        //     File::delete($books->image);
        // } }
    }else{
        return redirect()->back()->with('errors');
    }
        $books->update($data);
        
        return redirect()->back();
    }catch (Throwable $e) {
        report($e);
        return false;
        }
    
}
public function delete($id)
{
    $books=Book::findOrFail($id);
    if(File::exists($books->image))
        {
            File::delete($books->image);
        }
    $books->delete();
    return redirect()->route('book');
}
}
