<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\{Book,Category};
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index(){
        $categories=Category::orderBy('id')->get();
        $books= Book::all();
        return view('admin/books/books',compact('books','categories'));
    }  
    public function store(BookRequest $req){ 
       $data=$req->all();
        if($req->hasFile('image')){
            $ext=$req->image->extension();
            $filename=rand(1,100).time().'.'. $ext ;
            $fileNamewithUpload = "book/".$filename;
            $req->image->move('book'  , $filename);
            $data['image']= $fileNamewithUpload;
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

    if($req->hasFile('image')){
        $ext=$req->image->extension();
        $filename=rand(1,100).time().'.'. $ext ;
        $fileNamewithUpload = "book/".$filename;
        $req->image->move('book'  , $filename);
        $data['image']=$fileNamewithUpload;
        // if(File::exists($books->image))
        // {
        //     File::delete($books->image);
        // }
    }try {
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
