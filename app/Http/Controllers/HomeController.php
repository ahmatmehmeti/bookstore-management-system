<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $books = Book::count();
        $postiers = User::where('role','postier')->count();
        $categories = Category::count();
        if(auth()->user()->IsAdmin()){
            $orders = Order::count();
        }elseif((auth()->user()->IsPostier())){
            $orders = Order::where('postier_id', auth()->user()->id)->count();
        }else{
            $orders = Order::where('created_by', auth()->user()->id)->count();
        }


        if(auth()->user()->IsAdmin()){
            $pending = Order::where('status', 'pending')->count();
            $delivering = Order::where('status', 'delivering')->count();
            $delivered = Order::where('status', 'delivered')->count();
        }elseif((auth()->user()->IsPostier())){
            $pending = Order::where('postier_id', auth()->user()->id)->where('status','pending')->count();
            $delivering = Order::where('postier_id', auth()->user()->id)->where('status','delivering')->count();
            $delivered = Order::where('postier_id', auth()->user()->id)->where('status','delivered')->count();
        }else{
            $pending = Order::where('created_by', auth()->user()->id)->where('status','pending')->count();
            $delivering = Order::where('created_by', auth()->user()->id)->where('status','delivering')->count();
            $delivered = Order::where('created_by', auth()->user()->id)->where('status','delivered')->count();
        }




/*
        $pending = Order::where('status', 'pending')->count();
        $delivering = Order::where('status', 'delivering')->count();
        $delivered = Order::where('status', 'delivered')->count();*/

        return view('dashboard',compact('users','books','postiers','categories','orders','pending','delivering','delivered'));

    }
}
