<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Login'
        ]);
    }

    public function create(Request $request)
    {
        $validatedAcc = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'is_admin' => 'required'
        ]);

        $validatedAcc['password'] = bcrypt($validatedAcc['password']);

        User::create($validatedAcc);

        session()->flash('success', 'Registration Successfull!');
        return redirect('/login');
    }
}
