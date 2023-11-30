<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $lines = Line::take(3)->get();
        return view('home', compact('lines'));
    }
}
