<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookValidation;
use App\Models\Book;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Image;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index');
    }

    public function show($id)
    {
        $book = Book::find($id);
        if(Auth::check() )
        {
            return view('books.show',compact('book'));
        }else{
            return view('books.guest',compact('book'));
        }
    }

    public function datatable()
    {
        $books = Book::get(['id','title', 'description', 'author', 'about_author','publisher','date_published','category_id','image','qty','price','pages'] );

        return Datatables::of($books)
            ->addColumn('title', function ($book) {
                return $book->title;
            })
            ->addColumn('description', function ($book) {
                return Str::limit($book->description, 20);
            })
            ->addColumn('author', function ($book) {
                return $book->author;
            })
            ->addColumn('about_author', function ($book) {
                return Str::limit($book->about_author, 20);
            })
            ->addColumn('publisher', function ($book) {
                return $book->publisher;
            })
            ->addColumn('date_published', function ($book) {
                return $book->date_published;
            })
            ->addColumn('category_id', function ($book) {
                return $book->category_id;
            })
            ->addColumn('image', function ($book) {
                return $book->image;
            })
            ->addColumn('qty', function ($book) {
                return $book->qty;
            })
            ->addColumn('price', function ($book) {
                return $book->price;
            })
            ->addColumn('pages', function ($book) {
                return $book->pages;
            })
            ->addColumn('actions', function ($book) {
                return view('books.includes.actions', compact('book'))->render();
            })
            ->rawColumns(['title', 'description', 'author','about_author', 'publisher','date_published','category_id','image','qty','price','pages','actions'])
            ->make(true);
    }

    public function create()
    {
        $categories = Category::get(['id','name']);
        return view('books.create', compact('categories'));
    }

    public function store(BookValidation $request)
    {
        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'about_author' => $request->about_author,
            'publisher' => $request->publisher,
            'date_published' => $request->date_published,
            'category_id' => $request->category_id,

             $filename = time().'.'.request()->image->getClientOriginalExtension(),
            $request->image->move(public_path('images'), $filename),
           'image' => $filename,
            'qty' => $request->qty,
            'price' => $request->price,
            'pages' => $request->pages,

        ]);
        Toastr::success('Book added successfully','Success');
        return redirect()->route('books.index');
    }


    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::get(['id','name']);
        return view('books.edit', compact('book','categories'));
    }

    public function update(BookValidation $request, $id)
    {
        $book = Book::find($id);
        $book -> update([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'about_author' => $request->about_author,
            'publisher' => $request->publisher,
            'date_published' => $request->date_published,
            'category_id' => $request->category_id,

            $filename = time().'.'.request()->image->getClientOriginalExtension(),
            $request->image->move(public_path('images'), $filename),
            'image' => $filename,
            'qty' => $request->qty,
            'price' => $request->price,
            'pages' => $request->pages,
        ]);

        Toastr::success('Book updated successfully','Success');
        return view('books.index', compact('book'));

    }

    public function destroy($id){
        $book = Book::find($id);
        $book ->delete();
        Toastr::info('Book deleted successfully','Success');
        return redirect()->route('books.index');
    }


    public function welcome(Request $request)
    {
        $books = Book::paginate(8);
        $categories = Category::get(['id', 'name']);

        return view('welcome', compact('books', 'categories'));
    }

    public function getBooksByCategory($id)
    {
        $books = Book::where('category_id', $id)->paginate(8);
        $categories = Category::get(['id', 'name']);

        return view('welcome', compact('books', 'categories'));
    }


}

