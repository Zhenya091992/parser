<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function index()
    {
        return view('Cabinet.cabinet', ['user' => Auth::user()]);
    }

    public function create()
    {
        return view('Category.create');
    }

    public function setup()
    {
        return view('Cabinet.setup');
    }
}
