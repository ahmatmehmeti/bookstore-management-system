<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Http\Requests\UserEmailUpdateValidation;
use App\Http\Requests\UserValidation;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\Registered;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function datatable()
    {
        $users = User::get(['id', 'name', 'email', 'role','created_at']);

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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        $user->update([
            'password' => Hash::make($user->name.$user->id),
        ]);

        event(new UserRegistered($user));

        Toastr::success('User added successfully','Success');
        return redirect()->route('users.index',compact('user'));
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
        Toastr::success('User updated successfully','Success');
        return view('users.index', compact('user'));
    }

    public function destroy($id){
        $user = User::find($id);
        $user ->delete();

        Toastr::info('User deleted successfully','Success');
        return redirect()->route('users.index');
    }
}
