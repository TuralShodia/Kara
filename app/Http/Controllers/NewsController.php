<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function info(){
        $news= new News();
        $allnews= $news::all();
        return view('admin/info/info',compact('allnews'));
    }  
    public function insert(Request $req){ 
        $data=[
            'name'=>$req->name,
            'title'=>$req->title,
            'image'=>$req->image
        ];
        $validator=Validator::make($data,[
            'name'=>'required',
            'title'=>'required',
            'image'=>'required| mimes:png,jpg'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $news = new News();
        
        if($req->has('image')){
            $ext=$req->image->extension();
            $filename=rand(1,100).time().'.'. $ext ;
            $fileNamewithUpload = "images/".$filename;
            $req->image->move('images'  , $filename);
            // $req->image->storeAs('public/storage/images/',$filename);
            $news->image=$fileNamewithUpload;
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
    public function update($id, Request $req){
        $data=[
            'name'=>$req->name,
            'title'=>$req->title,
            'image'=>$req->image
        ];
        $validator=Validator::make($data,[
            'name'=>'required',
            'title'=>'required',
            'image'=>'mimes:png,jpg'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        
        $news = News::find($id);

        if($req->has('image')){
            $ext=$req->image->extension();
            $filename=rand(1,100).time().'.'. $ext ;
            $fileNamewithUpload = "product/".$filename;
            $req->image->move('product'  , $filename);
            $news->image=$fileNamewithUpload;
            // if(File::exists($products->image))
            // {
            //     File::delete($products->image);
            // }
        }
        try {
            $news->title = $req->title;
            $news->name = $req->name;
            $news->save();

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
