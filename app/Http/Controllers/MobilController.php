<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\Merk;
use App\Models\Mobil;
use Illuminate\Support\Facades\Storage; // Import Storage class

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::all();
        return view('mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::all();
        $merk  = Merk::all();
        return view('mobil.create', compact('jenis', 'merk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mobil = new Mobil; // Corrected: Create a new Mobil instance
        $mobil->nama_mobil = $request->nama_mobil;
        $mobil->harga = $request->harga;
        $mobil->stok = $request->stok;
        $mobil->id_jenis = $request->id_jenis;
        $mobil->id_merk = $request->id_merk;

        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('storage/images', $name);
            $mobil->foto = $name;
        }
        
        $mobil->save(); // Corrected: Save the $mobil instance
        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('mobil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('mobil.show', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id); // Corrected spelling and used findOrFail
        $jenis = Jenis::all();
        $merk  = Merk::all();
        return view('mobil.edit', compact('mobil', 'jenis', 'merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $mobil = Mobil::findOrFail($id); // Correct: Find the existing Mobil instance
        $mobil->nama_mobil = $request->nama_mobil;
        $mobil->harga = $request->harga;
        $mobil->stok = $request->stok;
        $mobil->id_jenis = $request->id_jenis;
        $mobil->id_merk = $request->id_merk;

        if ($request->hasFile('foto')) {
            // Delete the old image if it exists
            if ($mobil->foto && file_exists(public_path('images/' . $mobil->foto))) {
                unlink(public_path('images/' . $mobil->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Use timestamp
            $file->move(public_path('images'), $filename); //store in folder
            $mobil->foto = $filename;
        }

        $mobil->save(); // Corrected: Save the $mobil instance
        session()->flash('success', 'Data Berhasil Diubah');
        return redirect()->route('mobil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);
        
        $mobil->delete();
        return redirect()->route('mobil.index')->with('success', 'Data berhasil dihapus');
    }
}