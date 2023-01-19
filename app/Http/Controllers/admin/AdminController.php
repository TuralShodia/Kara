<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $book=Book::count();
        $category=Category::count();
        $user=User::count();
        return view('admin/dashboard',compact('book','category','user'));
    }
    public function orderTable(){
        // return User::where('id', 10)->with('books')->first();
        // return Book::where('id', 1)->with('users')->first();

        $orders=Order::all();
        
        foreach($orders as $key=>$order){
            $orders[$key]['book_name'] = $this->getBookNameById($order->book_id);
            $orders[$key]['user_name'] = $this->getUserNameById($order->user_id);
        }
        return view('admin/order',compact('orders'));
    }

    public function getBookNameById($book_id){
        if(!Book::find($book_id)){
            return 'Book Deleted';
        }
        return Book::find($book_id)->name;
    }
    public function getUserNameById($user_id){
        if(!User::find($user_id)){
            return 'User Deleted';
        }
        return User::find($user_id)->name;
    }

    public function order($id){
          $characters = '123456ABCDEF';
        Order::create([
            'book_id'=>$id,
            'user_id'=>Auth::id(),
            'promocode'=>substr(str_shuffle($characters), 0, 6)
        ]);
        return redirect()->back()->with('success','Book Ordered Successfully ');  
        
    }
    public function delete($id)
    {
        $order=Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order')->with('success','Order Deleted Successfully');;
    }
    
}
