<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController
{
    public function index()
    {
        // return Visitor::all();
        return view('dashboard.account', [
            "users" => User::latest()->paginate(50)
        ]);
    }

    public function edit()
    {

    }
}
