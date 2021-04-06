<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryValidation;
use App\Http\Requests\UserEmailUpdateValidation;
use App\Models\Category;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function datatable()
    {
        $categories = Category::get(['id', 'name','created_at']);

        return Datatables::of($categories)
            ->addColumn('name', function ($category) {
                return $category->name;
            })
            ->addColumn('created_at', function ($category) {
                return $category->created_at->format('d-m-y');
            })
            ->addColumn('actions', function ($category) {
                return view('categories.includes.actions', compact('category'))->render();
            })
            ->rawColumns(['name', 'created_at', 'actions'])
            ->make(true);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryValidation $request)
    {
        Category::create([
            'name' => $request->name,
        ]);
        Toastr::success('Category added successfully','Success');
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(CategoryValidation $request, $id)
    {
        $category = Category::find($id);
        $category ->update($request -> all());
        Toastr::success('Category updated successfully','Success');
        return view('categories.index',compact('category'));
    }

    public function destroy($id){
        $category = Category::find($id);
        $category ->delete();
        Toastr::info('Category deleted successfully','Success');
        return view('categories.index',compact('category'));
    }
}
