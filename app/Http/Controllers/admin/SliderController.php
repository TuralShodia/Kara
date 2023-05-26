<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Slider\StoreRequest;
use App\Http\Requests\Slider\UpdateRequest;

class SliderController extends Controller
{
    public function index(){
        $sliders= Slider::all();

        return view('admin/sliders/index',compact('sliders'));
    }  

    public function store(StoreRequest $req)
    {
       $data=$req->all();
       if($req->hasFile('image')){
        $ext=$req->image->extension();
        $filename=rand(1,100).time().'.'. $ext ;
        $fileNamewithUpload = "slider/".$filename;
        $req->image->move('slider'  , $filename);
        $data['image'] = $fileNamewithUpload;
        }else{
            return redirect()->back()->with('errors');
        }
        try {
            Slider::create($data);
            return redirect()->back()->with('success','Slider Inserted Successfully');
        }catch (Throwable $e) {
            report($e);
            return false;
            }
        
        return redirect()->back()->with('success','Slider Inserted Successfully');
    }
    
    public function edit($id)
    {
        $slider=Slider::findOrFail($id);

        return view('admin/sliders/update',compact('slider','categories'));
    }

    public function update($id, UpdateRequest $req)
    {
        
    try {   
        $data=$req->all();
        $sliders=Slider::findOrFail($id);
        $sliders->update([
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
            $fileNamewithUpload = "slider/".$filename;
            $req->image->move('slider'  , $filename);
            $data['image']=$fileNamewithUpload;
            // if(File::exists($sliders->image))
            // {
            //     File::delete($sliders->image);
            // } }
            $sliders->update(['image'=>$data['image']]);
        
        }
        return redirect()->back()->with('success','Slider Updated Successfully');    
        }catch (Throwable $e) {
            report($e);
            return false;
            }
        
    }
    public function delete($id)
    {
        $sliders=Slider::findOrFail($id);
        if(File::exists($sliders->image))
            {
                File::delete($sliders->image);
            }
        $sliders->delete();
        return redirect()->route('slider')->with('success','Slider Deleted Successfully');;
    }
}
