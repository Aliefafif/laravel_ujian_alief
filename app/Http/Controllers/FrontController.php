<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\Merk;
use App\Models\Mobil;

class FrontController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        $merk = Merk::all();
        $mobil = Mobil::all();
        return view('welcome', compact('jenis','merk','mobil'));
        
    }
}
