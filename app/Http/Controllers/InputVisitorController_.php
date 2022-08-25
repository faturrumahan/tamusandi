<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputVisitorController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => ''
        ]);
    }
}
