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

public function update($id, BookUpdateRequest $req)
{
    

    // try {
    //     $experience = Experience::findOrFail($id);

    //     $experience->update([
    //         'company_name' =>   $req->company_name,
    //         'duty'         =>   $req->duty,
    //         'start'        =>   $req->start,
    //         'end'          =>   $req->end,
    //         'work_time'    =>   $req->work_time,
    //         'type'         =>   $req->type
    //     ]);

    //     if ($files = $req->file('image')) {
    //         request()->validate([
    //             'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         ]);
    //         $image_path = public_path($experience->image);
    //         if (File::exists($image_path)) {
    //             File::delete($image_path);
    //         }
    //         $destinationPath = public_path('/images/');
    //         $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
    //         $files->move($destinationPath, $profileImage);
    //         $experience->update(['image' => 'images/' . $profileImage]);
    //     }
    //     return redirect()->back()->with('success', 'Updated successfully!');
    // } catch (\Exception $exception) {
    //     return redirect()->back()->with('error', $exception->getMessage());
    // }

    
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
        // if(File::exists($books->image))
        // {
        //     File::delete($books->image);
        // } }
        $books->update(['image'=>$data['image']]);
    }else{
        return redirect()->back()->with('errors');
    }
        
        
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
