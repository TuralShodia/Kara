<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\NewsUpdateRequest;


class NewsController extends Controller
{
    public function index(){
        $allnews= News::all();
        return view('admin/info/info',compact('allnews'));
    }  
    public function store(NewsRequest $req){ 
        

        $news = new News();
        
        if($req->hasFile('image')){
            $ext=$req->image->extension();
            $filename=rand(1,100).time().'.'. $ext ;
            $fileNamewithUpload = "images/".$filename;
            $req->image->move('images'  , $filename);
            // $req->image->storeAs('public/storage/images/',$filename);
            $news->image=$fileNamewithUpload;
        }else{
            return redirect()->back()->with('errors');
        }
        $news->title = $req->title;
        $news->description = $req->description;
        $news->save();
        
        return redirect()->route('info');
    }
    public function edit($id)
    {
        $news=News::findOrFail($id);
        return view('admin/info/update',compact('news'));
    }
    public function update($id, NewsUpdateRequest $req){
        
        try {   
            $data=$req->all();
            $news=News::findOrFail($id);
            $news->update([
                'description'=>$req->description,
                'title'=>$req->title,
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
                $news->update(['image'=>$data['image']]);
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
                $news=News::findOrFail($id);
                if(File::exists($news->image))
                    {
                        File::delete($news->image);
                    }
                $news->delete();
                return redirect()->route('info');
            }
            
}
