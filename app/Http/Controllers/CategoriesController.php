<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function category(){
        $category= new Category();
        $categories= $category::all();
        return view('admin/categories/categories',compact('categories'));
    }  
    public function insert(Request $req){ 

        $categories = new Category();
        $categories->name = $req->name;
        $categories->category_id = $req->category_id;
        $categories->save();
        return redirect()->route('categories');

    }
    public function edit($id)
    {
        $categories=Category::findOrFail($id);
        return view('admin/categories/update',compact('categories'));
    }
    public function update($id, Request $req){
        $data=[
            'name'=>$req->name,
        ];
        $validator=Validator::make($data,[
            'name'=>'required',            
        ]);
        if($validator->fails()){
           
            return redirect()->back()->withErrors($validator);
        }
        $categories = Category::find($id);
        
        try {
            $categories->name = $req->name;
            $categories->save();
            return redirect()->back()->with('success','updated successfully');
        } catch (Throwable $e) {
            report($e);
            return false;
        }
}
}
