<?php

namespace App\Http\Controllers\admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {
        $about=About::first();
        return view('admin/about',compact('about'));
    }
    public function update(AboutRequest $req){
        $data=$req->all();
        $about = About::first();
        if($req->hasFile('image')){
            $ext=$req->image->extension();
            $filename=rand(1,100).time().'.'. $ext ;
            $fileNamewithUpload = "about/".$filename;
            $req->image->move('about'  , $filename);
            $data['image']=$fileNamewithUpload;
            if(File::exists($about->image))
            {
                File::delete($about->image);
            } 
        }
        $about->update($data);
        return redirect()->back();

    }
}
