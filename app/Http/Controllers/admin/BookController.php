<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
        Book::create($data);
        return redirect()->route('book');
    }
    
public function edit($id)
{
    $book=Book::findOrFail($id);

    return view('admin/books/update',compact('book'));
}

public function update(Request $req, $id)
{
    $data=$req->all();

    $validator =Validator::make($data,
    [
        'name'=>'required',
        'language'=>'required',
        'image'=>'required',
        'writer'=>'required',
        '`year`'=>'required',
        '`language`'=>'required',
        'pages'=>'required',
        'category_id'=>'required'

    ]);
    if($validator->fails()){
        return redirect()->back()->withErrors($validator);
    }

    $books=Book::findOrFail($id);

    if($req->hasFile('image')){
        $ext=$req->image->extension();
        $filename=rand(1,100).time().'.'. $ext ;
        $fileNamewithUpload = "book/".$filename;
        $req->image->move('book'  , $filename);
        $books->image=$fileNamewithUpload;
        // if(File::exists($books->image))
        // {
        //     File::delete($books->image);
        // }
    }
    Book::create($data);
        // $books->writer=$req->writer;
        // $books->pages=$req->pages;
        // $books->year=$req->year;
        // $books->name=$req->name;
        // $books->save();

       
        return redirect()->back();
    
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
