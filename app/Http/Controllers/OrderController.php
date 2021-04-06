<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderValidation;
use App\Http\Requests\UserEmailUpdateValidation;
use App\Http\Requests\UserValidation;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function datatable()
    {
        if (auth()->user()->isAdmin())
        {
            $orders = Order::get();

        }elseif(auth()->user()->isPostier()){
            $orders = Order::where('postier_id', auth()->id())->get();

        }else{
            $orders = Order::where('created_by', auth()->id())->get();
        }

        return Datatables::of($orders)
            ->addColumn('book', function ($order) {
                return $order->book->title;
            })
            ->addColumn('user', function ($order) {
                return $order->user->name;
            })
            ->addColumn('postier', function ($user) {
                return $user->postier ? $user->postier->name : '';
            })
            ->addColumn('qty', function ($order) {
                return $order->qty;
            })
            ->addColumn('status', function ($order) {

                if ($order->status === 'delivered') {
                    $status = 'badge badge-success';
                } elseif ($order->status === 'pending') {
                    $status = 'badge badge-danger';
                } else {
                    $status = 'badge badge-warning';
                }

                return '<span class="' . $status . '">' . $order->status. '</span>';

                return $user->status;
            })
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('d/m/y');
            })
            ->addColumn('actions', function ($order) {
                $user = auth()->user();
                return view('orders.includes.actions', compact('user', 'order'))->render();
            })
            ->rawColumns(['book', 'user', 'postier','qty', 'status', 'created_at', 'actions'])
            ->make(true);
    }

    public function create()
    {
        Gate::authorize('create-orders');
        $books = Book::get(['id', 'title', 'image', 'description']);
        $categories = Category::get(['id', 'name']);

        return view('orders.create', compact('books', 'categories'));
    }


    public function store(OrderValidation $request)
    {
        Gate::authorize('create-orders');
        $book = Book::where('id',$request->book_id)->first();
        if(($book->qty + $request->qty) < $book->qty)
        {
            Toastr::error('There is no quantity for this book','Success');
            return redirect()->route('books.show',$request->book_id);
        }
        Order::create([
            'book_id'        => $request->book_id,
            'created_by'     => auth()->id(),
            'city'           => $request->city,
            'contact_number' => $request->contact_number,
            'address'        => $request->address,
            'qty'            => $request->qty,
            'comment'        => $request->comment,
        ]);

        $book->update([
            'qty' => $book->qty - $request->qty,
        ]);


        Toastr::success('Order added successfully','Success');
        return redirect()->route('orders.index');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        Gate::authorize('edit-orders',$order);
        $postiers = User::where('role', 'postier')->get(['id', 'name']);
        $books = Book::get(['id', 'title', 'image', 'description']);

        return view('orders.edit', compact('order','postiers', 'books'));


    }

    public function update(OrderValidation $request, $id)
    {

        $order = Order::where('id', $id)->update([
            'book_id'        => $request->book,
            'city'           => $request->city,
            'contact_number' => $request->contact_number,
            'address'        => $request->address,
            'qty'            => $request->qty,
            'comment'        => $request->comment,
            'postier_id'     => $request->postier ?? null,
        ]);

        Gate::authorize('edit-orders',$order);

        Toastr::success('Order updated successfully','Success');
        return view('orders.index', compact('order'));

    }

    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();
        Toastr::info('Order deleted successfully','Success');
        return redirect()->route('orders.index');
    }

    public function accept($id)
    {
        Order::where('id', $id)->update([
            'status' => 'delivering',
        ]);

        return view('orders.index');
    }

    public function delivered($id)
    {
        Order::where('id', $id)->update([
            'status' => 'delivered',
        ]);

        return view('orders.index');
    }

    public function pendingdatatable()
    {
        if(auth()->user()->IsPostier() ){
            $orders = Order::where('postier_id', auth()->user()->id)->where('status','pending')->get();
        }elseif((auth()->user()->IsAdmin() )){
            $orders = Order::where('status','pending')->get();
        }else{
            $orders = Order::where('created_by', auth()->user()->id)->where('status','pending')->get();
        }

        return Datatables::of($orders)
            ->addColumn('book', function ($order) {
                return $order->book->title;
            })
            ->addColumn('user', function ($order) {
                return $order->user->name;
            })
            ->addColumn('postier', function ($user) {
                return $user->postier ? $user->postier->name : '';
            })
            ->addColumn('qty', function ($order) {
                return $order->qty;
            })
            ->addColumn('status', function ($order) {

                if ($order->status === 'delivered') {
                    $status = 'badge badge-success';
                } elseif ($order->status === 'pending') {
                    $status = 'badge badge-danger';
                } else {
                    $status = 'badge badge-warning';
                }

                return '<span class="' . $status . '">' . $order->status. '</span>';

                return $user->status;
            })
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('d/m/y');
            })
            ->addColumn('actions', function ($order) {
                $user = auth()->user();
                return view('orders.includes.actions', compact('user', 'order'))->render();
            })
            ->rawColumns(['book', 'user', 'postier','qty', 'status', 'created_at', 'actions'])
            ->make(true);
    }

    public function pending(){
        return view('orders.status.pending');
    }


    public function deliveringdatatable()
    {
        if(auth()->user()->IsPostier() ){
            $orders = Order::where('postier_id', auth()->user()->id)->where('status','delivering')->get();
        }elseif((auth()->user()->IsAdmin() )){
            $orders = Order::where('status','delivering')->get();
        }else{
            $orders = Order::where('created_by', auth()->user()->id)->where('status','pending')->get();
        }

        return Datatables::of($orders)
            ->addColumn('book', function ($order) {
                return $order->book->title;
            })
            ->addColumn('user', function ($order) {
                return $order->user->name;
            })
            ->addColumn('postier', function ($user) {
                return $user->postier ? $user->postier->name : '';
            })
            ->addColumn('qty', function ($order) {
                return $order->qty;
            })
            ->addColumn('status', function ($order) {

                if ($order->status === 'delivered') {
                    $status = 'badge badge-success';
                } elseif ($order->status === 'pending') {
                    $status = 'badge badge-danger';
                } else {
                    $status = 'badge badge-warning';
                }

                return '<span class="' . $status . '">' . $order->status. '</span>';

                return $user->status;
            })
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('d/m/y');
            })
            ->addColumn('actions', function ($order) {
                $user = auth()->user();
                return view('orders.includes.actions', compact('user', 'order'))->render();
            })
            ->rawColumns(['book', 'user', 'postier','qty', 'status', 'created_at', 'actions'])
            ->make(true);
    }

    public function delivering(){
        return view('orders.status.delivering');
    }


    public function delivereddatatable()
    {
        if(auth()->user()->IsPostier() ){
            $orders = Order::where('postier_id', auth()->user()->id)->where('status','delivered')->get();
        }elseif((auth()->user()->IsAdmin() )){
            $orders = Order::where('status','delivered')->get();
        }else{
            $orders = Order::where('created_by', auth()->user()->id)->where('status','pending')->get();
        }

        return Datatables::of($orders)
            ->addColumn('book', function ($order) {
                return $order->book->title;
            })
            ->addColumn('user', function ($order) {
                return $order->user->name;
            })
            ->addColumn('postier', function ($user) {
                return $user->postier ? $user->postier->name : '';
            })
            ->addColumn('qty', function ($order) {
                return $order->qty;
            })
            ->addColumn('status', function ($order) {

                if ($order->status === 'delivered') {
                    $status = 'badge badge-success';
                } elseif ($order->status === 'pending') {
                    $status = 'badge badge-danger';
                } else {
                    $status = 'badge badge-warning';
                }

                return '<span class="' . $status . '">' . $order->status. '</span>';

                return $user->status;
            })
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('d/m/y');
            })
            ->addColumn('actions', function ($order) {
                $user = auth()->user();
                return view('orders.includes.actions', compact('user', 'order'))->render();
            })
            ->rawColumns(['book', 'user', 'postier','qty', 'status', 'created_at', 'actions'])
            ->make(true);
    }

    public function deliveredorders(){
        return view('orders.status.deliveredorders');
    }
}
