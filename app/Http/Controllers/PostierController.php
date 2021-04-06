<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEmailUpdateValidation;
use App\Http\Requests\UserValidation;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PostierController extends Controller
{
    public function index()
    {
        return view('postiers.index');
    }

    public function datatable()
    {
        $users = User::where('role', 'postier')->get();

        return Datatables::of($users)
            ->addColumn('name', function ($user) {
                return $user->name;
            })
            ->addColumn('email', function ($user) {
                return $user->email;
            })
            ->addColumn('role', function ($user) {
                return $user->role;
            })
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('d-m-y');
            })
            ->addColumn('actions', function ($user) {
                return view('users.includes.actions', compact('user'))->render();
            })
            ->rawColumns(['name', 'email', 'created_at', 'actions'])
            ->make(true);
    }



    public function create()
    {
        return view('users.create');
    }


    public function store(UserValidation $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password'=>Hash::make(Str::random(10)),
        ]);
        Toastr::info('Postier added successfully','Success');
        return redirect()->route('postiers.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));


    }

    public function update(UserEmailUpdateValidation $request, $id)
    {
        $user = User::find($id);
        $user -> update($request->all());
        Toastr::info('Postier updated successfully','Success');
        return view('users.index', compact('user'));

    }

    public function destroy($id){
        $user = User::find($id);
        $user ->delete();
        Toastr::info('Postier deleted successfully','Success');
        return redirect()->route('users.index');
    }
}
