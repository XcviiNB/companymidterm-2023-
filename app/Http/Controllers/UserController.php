<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::latest('id')->get();

        return inertia('Users/Index', compact('users'));
    }

    public function create() {
        return inertia('Users/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'username'      => 'required',
            'fullname'      => 'required|unique:users',
            'password'      => 'required'
        ]);

        User::create([
            'username'      => $request->username,
            'fullname'      => $request->fullname,
            'password'      => bcrypt($request->password)
        ]);

        return redirect('/')->with('Info', 'Registered succesfully');
    }
}
