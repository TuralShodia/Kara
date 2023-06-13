<?php

namespace App\Http\Controllers\admin;

use Throwable;
use Illuminate\Http\Request;
use App\Models\{Book,Category};
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BookUpdateRequest;
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
            return redirect()->back()->with('success','Book Inserted Successfully');
        }catch (Throwable $e) {
            report($e);
            return false;
            }
        
        return redirect()->back()->with('success','Book Inserted Successfully');
    }
    
    public function edit($id)
    {
        $book=Book::findOrFail($id);
        $categories=Category::all();

        return view('admin/books/update',compact('book','categories'));
    }

    public function update($id, BookUpdateRequest $req){ 
    try {   
        $data=$req->all();
        $books=Book::findOrFail($id);
        $books->update([
            'name'=>$req->name,
            'year'=>$req->year,
            'pages'=>$req->pages,
            'writer'=>$req->writer,
            'language'=>$req->language,
            'category_id'=>$req->category_id,
            'description'=>$req->description,
        ]);
        if($req->hasFile('image')){
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            $ext=$req->image->extension();
            $filename=rand(1,100).time().'.'. $ext ;
            $fileNamewithUpload = "book/".$filename;
            $req->image->move('book'  , $filename);
            $data['image']=$fileNamewithUpload;
            $books->update(['image'=>$data['image']]);
        
        }
        return redirect()->back()->with('success','Book Updated Successfully');    
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
        return redirect()->route('book')->with('success','Book Deleted Successfully');
    }
}
