<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RoleController extends Controller
{
    public function add_user(Request $request)
    {
    	$users = User::all();
    	return view('/admin/users', ['users'=>$users]);
    }

    public function delete_user(Request $request)
    {
    	User::where('id', $request->id)->delete();
    	return redirect()->back()->with('success', 'User Deleted Successfully');
    }

    public function store_user(Request $request)
    {
    	$user = new User;
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->role = $request->input('role');
    	$user->password = Hash::make($request->input('password'));
    	$user->save();
    	return redirect()->back()->with('success', 'User Created Successfully');
    }
}
