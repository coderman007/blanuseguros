<?php

namespace App\Http\Controllers;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $lines = InsuranceLine::take(3)->get();
        return view('home.home', compact('lines'));
    }

    public function about()
    {
        $insuranceCompanies = InsuranceCompany::get();
        return view('home.about', compact('insuranceCompanies'));
    }

    public function services()
    {
        return view('home.services');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function blog()
    {
        return view('home.blog');
    }

    public function terms()
    {
        return view('terms');
    }

    public function policy()
    {
        return view('policy');
    }

    public function linesList()
    {
        $lines = InsuranceLine::get();
        return view('lines.lines-list', compact('lines'));
    }
}
