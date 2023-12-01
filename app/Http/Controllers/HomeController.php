<?php

namespace App\Http\Controllers;

use App\Models\InsuranceLine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $lines = InsuranceLine::take(3)->get();
        return view('home', compact('lines'));
    }
}
