<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceLine;

class InsuranceDetailsController extends Controller
{
    public function show($id)
    {
        // Encuentra la línea de seguros por su ID
        $line = InsuranceLine::findOrFail($id);

        // Puedes personalizar esta lógica según tus necesidades
        return view('insurance-details.show', compact('line'));
    }
}
