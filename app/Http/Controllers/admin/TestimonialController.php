<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Slider\StoreRequest;
use App\Http\Requests\Testimonial\UpdateRequest;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials= Testimonial::all();

        return view('admin/testimonials/index',compact('testimonials'));
    }  

    public function store(StoreRequest $req)
    {
       $data=$req->all();
       if($req->hasFile('image')){
        $ext=$req->image->extension();
        $filename=rand(1,100).time().'.'. $ext ;
        $fileNamewithUpload = "testimonial/".$filename;
        $req->image->move('testimonial'  , $filename);
        $data['image'] = $fileNamewithUpload;
        }else{
            return redirect()->back()->with('errors');
        }
        try {
            Testimonial::create($data);
            return redirect()->back()->with('success','Testimonial Inserted Successfully');
        }catch (Throwable $e) {
            report($e);
            return false;
            }
        
        return redirect()->back()->with('success','Testimonial Inserted Successfully');
    }
    
    public function edit($id)
    {
        $testimonial=Testimonial::findOrFail($id);

        return view('admin/testimonials/update',compact('testimonial'));
    }

    public function update($id, UpdateRequest $req)
    {
        
    try {   
        $data=$req->all();
        $testimonials=Testimonial::findOrFail($id);
        $testimonials->update([
            'name'=>$req->name,
            'description'=>$req->description,
        ]);
        if($req->hasFile('image')){
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            $ext=$req->image->extension();
            $filename=rand(1,100).time().'.'. $ext ;
            $fileNamewithUpload = "testimonial/".$filename;
            $req->image->move('testimonial'  , $filename);
            $data['image']=$fileNamewithUpload;
            // if(File::exists($testimonials->image))
            // {
            //     File::delete($testimonials->image);
            // } }
            $testimonials->update(['image'=>$data['image']]);
        
        }
        return redirect()->back()->with('success','Testimonial Updated Successfully');    
        }catch (Throwable $e) {
            report($e);
            return false;
            }
        
    }
    public function delete($id)
    {
        $testimonials=Testimonial::findOrFail($id);
        if(File::exists($testimonials->image))
            {
                File::delete($testimonials->image);
            }
        $testimonials->delete();
        return redirect()->route('testimonial')->with('success','Testimonial Deleted Successfully');;
    }
}

