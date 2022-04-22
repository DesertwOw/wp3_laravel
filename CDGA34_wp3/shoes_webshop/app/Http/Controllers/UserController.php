<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserFormRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return redirect('/user/adduser')->with('message','User Added Successfully!');
    }

    public function edit($id)
    {
        $id = User::find($id);
        return view('user.edit',compact('id'));
    }

    public function update(UserFormRequest $request, $id)
    {
        $data = $request->validated();
        $user = User::where('id',$id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return redirect('/user/index')->with('message','User updated Successfully!');
    }

    public function delete($id)
    {
        $user = User::find($id)->delete();
        return redirect('/user/index')->with('message','User deleted Successfully!');
    }
}
