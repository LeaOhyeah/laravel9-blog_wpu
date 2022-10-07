<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100|min:1',
            'username' => 'required|max:16|min:4|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:16',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session('success', 'Registration successfull!');
        return redirect('/login')->with('success', 'Registration successfull!');
    }
}
