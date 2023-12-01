<?php

namespace App\Http\Controllers;

use App\Models\InsuranceLine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $lines = InsuranceLine::take(3)->get();
        return view('home', compact('lines'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }

    public function blog()
    {
        return view('blog');
    }

    public function terms()
    {
        return view('terms');
    }

    public function policy()
    {
        return view('policy');
    }
}
