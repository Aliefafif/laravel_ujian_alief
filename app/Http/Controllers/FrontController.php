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
        $jenis = Jenis::orderBy('id','desc')->get();
        $merk = Merk::orderBy('id','desc')->get();
        $mobil = Mobil::orderBy('id','desc')->get();
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
    $mobil = Mobil::with(['jenis', 'merk'])->findOrFail($id);
    return view('detail', compact('mobil'));
}

    

}
