<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;


class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
        {
            $jenis = Jenis::all();
            return view('admin-view/jenis.index', compact('jenis'));
        }    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-view/jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_jenis' => 'required|unique:jenis,nama_jenis',
        ], [
            'nama_jenis.unique' => 'Nama jenis sudah ada, silakan pilih nama lain.'
        ]);
    
        $jenis = new Jenis;
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->save();
    
        session()->flash('success', 'Data Berhasil Ditambahkan');
    
        return redirect()->route('jenis.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('admin-view/jenis.show', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('admin-view/jenis.edit', compact('jenis'));
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
        $request->validate([
            'nama_jenis' => 'required|unique:jenis,nama_jenis,' . $id,
        ], [
            'nama_jenis.unique' => 'Nama jenis sudah ada, silakan pilih nama lain.'
        ]);
    
        $jenis = Jenis::findOrFail($id);
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->save();
    
        session()->flash('success', 'Data Berhasil Diubah');
    
        return redirect()->route('jenis.index');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        return redirect()->route('jenis.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
