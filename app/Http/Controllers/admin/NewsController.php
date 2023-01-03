<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;


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
        $news->name = $req->name;
        $news->save();
        
        return redirect()->route('info');
    }
    public function edit($id)
    {
        $news=News::findOrFail($id);
        return view('admin/info/update',compact('news'));
    }
    public function update($id, NewsRequest $req){
        $data=$req->all();
        $news = News::findOrFail($id);

        if($req->hasFile('image')){
            $ext=$req->image->extension();
            $filename=rand(1,100).time().'.'. $ext ;
            $fileNamewithUpload = "product/".$filename;
            $req->image->move('product'  , $filename);
            $data['image']=$fileNamewithUpload;
            // if(File::exists($products->image))
            // {
            //     File::delete($products->image);
            // }
        }else{
            return redirect()->back()->with('errors');
        }
        try {
            $news->update($data);
            return redirect()->back()->with('success','updated successfully');
        } catch (Throwable $e) {
            report($e);
     
            return false;
        }
        
    }
    public function delete($id)
    {
        $news=News::findOrFail($id);
        $news->delete();
        return redirect()->route('info');
    }


}
