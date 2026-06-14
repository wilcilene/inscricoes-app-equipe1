<?php

namespace App\Http\Controllers;

use App\Models\Edital; // Importa o model Edital
use Illuminate\Http\Request;

class MuralController extends Controller
{
    public function index()
    {
        $editais = Edital::latest()->get();
        return view('mural', compact('editais'));
    }
}
