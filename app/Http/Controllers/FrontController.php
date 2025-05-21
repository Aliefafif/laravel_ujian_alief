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
    public function show()
    {
        $jenis = Jenis::all();
        $merk = Merk::all();
        $mobil = Mobil::all();
        return view('car', compact('jenis','merk','mobil'));
        
    }

    public function about()
    {
        $jenis = Jenis::all();
        $merk = Merk::all();
        $mobil = Mobil::all();
        return view('about', compact('jenis','merk','mobil'));
        
    }
    public function detail($id)
    {
        $jenis = Jenis::findOrFail($id);
        $merk = Merk::findOrFail($id);
        $mobil = Mobil::findOrFail($id);
        return view('detail', compact('jenis','merk','mobil'));
        
    }
    

}
