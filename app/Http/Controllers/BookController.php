<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function book(){
        $categories=Category::orderBy('id')->get();
        $book= new Book();
        $books= $book::all();
        return view('admin/books/books',compact('books','categories'));
    }  
    public function insert(Request $req){ 
        $data=$req->all();
        $validator=Validator::make($data,[
            'name'=>'required',
            'image'=>'required| mimes:png,jpg',
            'category_id'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);

        }
        // $book = new book();
        
        if($req->has('image')){
            $ext=$req->image->extension();
            $filename=rand(1,100).time().'.'. $ext ;
            $fileNamewithUpload = "book/".$filename;
            $req->image->move('book'  , $filename);
            $data['image'] = $fileNamewithUpload;
            // $book->image=$fileNamewithUpload;
        }

        Book::create($data);
        
        // $book->name = $req->name;
        // $book->save();
        
 
        return redirect()->route('book');
    }
    
public function edit($id)
{
    $books=Book::findOrFail($id);

    return view('admin/books/update',compact('books'));
}

public function update(Request $req, $id)
{
    $data=[
        'name'=>$req->name,
        'image'=>$req->image,
    ];

    $validator =Validator::make($data,
    [
        'name'=>'required',
    ]);
    $validate=Validator::make( $data,[
        'image'=>'mimes:jpg,png',
    ]);
    if($validator->fails()){
        return redirect()->back()->withErrors($validator);
    }

    $books=Book::findOrFail($id);


    if($validate->fails()){
        return redirect()->back()->withErrors($validate);
    }
    if($req->has('image')){
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
        
        $books->name=$req->name;
        $books->save();

       
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
