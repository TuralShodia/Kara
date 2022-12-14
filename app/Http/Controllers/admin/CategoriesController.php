<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function index(){
        $categories= Category::all();
        return view('admin/categories/categories',compact('categories'));
    }  
    public function store(CategoryRequest $req){ 

        Category::create($req->all());
        return redirect()->route('categories');

    }
    public function edit($id)
    {
        $categories=Category::findOrFail($id);
        return view('admin/categories/update',compact('categories'));
    }
    public function update($id, CategoryRequest $req){

        $categories = Category::find($id);
        $data=$req->only(['name']);
        try {
            $categories->update($data);
            return redirect()->back()->with('success','updated successfully');
        } catch (Throwable $e) {
            report($e);
            return false;
        }
}
}
