<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function index()
    {
        return view('Cabinet.cabinet', ['user' => Auth::user()]);
    }
}
