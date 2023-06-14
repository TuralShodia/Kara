<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $book=Book::count();
        $category=Category::count();
        $user=User::count();
        return view('admin/dashboard',compact('book','category','user'));
    }

    public function orderTable()
    {
        $orders=Order::all();

        foreach($orders as $key=>$order){
            $orders[$key]['book_name'] = $this->getBookNameById($order->book_id);
            $orders[$key]['user_name'] = $this->getUserNameById($order->user_id);
        }
        return view('admin/order',compact('orders'));
    }

    public function dowloadOrdersPdf()
    {
        $orders=Order::all();

        $data = $orders->map(function ($order) {
            $order['book_image'] = $this->getBookImageById($order->book_id);
            $order['book_name'] = $this->getBookNameById($order->book_id);
            $order['user_name'] = $this->getUserNameById($order->user_id);
            return $order;
        });

        $orders = $data->toArray();
        return view('front.pdf.orders', compact('orders'));
    }



    public function getBookImageById($book_id)
    {
        if(!Book::find($book_id)){
            return 'Book Deleted';
        }
        return Book::find($book_id)->image;
    }

    public function getBookNameById($book_id)
    {
        if(!Book::find($book_id)){
            return 'Book Deleted';
        }
        return Book::find($book_id)->name;
    }

    public function getUserNameById($user_id)
    {
        if(!User::find($user_id)){
            return 'User Deleted';
        }
        return User::find($user_id)->name;
    }

    public function order($id)
    {
        if(Auth::user() and Auth::user()->role_id==1)
        {
            $characters = '123456ABCDEF';

            Order::create([
                'book_id'=>$id,
                'user_id'=>Auth::id(),
                'promocode'=>substr(str_shuffle($characters), 0, 6)
            ]);
            return redirect()->back()->with('success','Book Ordered Successfully ');
        }else{
            return redirect()->route('user.login');
        }

    }

    public function delete($id)
    {
        $order=Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order')->with('success','Order Deleted Successfully');;
    }

    public function orders($id)
    {
        $orders=Order::where('user_id',$id)->get();
        foreach($orders as $key=>$order){
            $orders[$key]['book_name'] = $this->getBookNameById($order->book_id);
            $orders[$key]['book_image'] = $this->getBookImageById($order->book_id);
        }
        return view('front.orders',compact('orders'));
    }

    public function orderCancel($id){
        $order=Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with('success','Order Canceled Successfully');;
    }
}
