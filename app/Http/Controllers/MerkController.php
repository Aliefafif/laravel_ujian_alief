<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;


class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = Merk::all();
            return view('admin-view/merk.index', compact('merk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-view/merk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi input
        $request->validate([
            'nama_merk' => 'required|unique:merks,nama_merk',
        ], [
            'nama_merk.unique' => 'Nama merk sudah ada, silakan pilih nama lain.'
        ]);
    
        $merk              = new Merk;
        $merk->nama_merk       = $request->nama_merk;
        $merk->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('admin-view/merk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merk = Merk::findOrFail($id);
        return view('admin-view/merk.show', compact('merk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merk = merk::findOrFail($id);
        return view('admin-view/merk.edit', compact('merk'));
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
        //validasi input
        $request->validate([
            'nama_merk' => 'required|unique:merks,nama_merk,' . $id,
        ], [
            'nama_merk.unique' => 'Nama merk sudah ada, silakan pilih nama lain.'
        ]);
        $merk              = Merk::findorFail($id);
        $merk->nama_merk  = $request->nama_merk;
        $merk->save();

        session()->flash('success', 'Data Berhasil Diubah');

        return redirect()->route('admin-view/merk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();

        return redirect()->route('admin-view/merk.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
