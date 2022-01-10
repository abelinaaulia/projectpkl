<?php

namespace App\Http\Controllers;
use App\Models\barang;
use App\Models\barangkeluar;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = barangkeluar::with('barang')->get();
        return view('barangkeluar.index', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangkeluar = barangkeluar::all();
        $barang = barang::all();
        return view('barangkeluar.create', compact('barangkeluar','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ///validasi data
      $request->validate([
        'id_barang' => 'required',
        'jumlah' => 'required',
        'tgl_keluar' => 'required',
    ]);

     $barangkeluar = new barangkeluar;
     $barangkeluar->id_barang = $request->id_barang;
     $barangkeluar->jumlah = $request->jumlah;
     $barangkeluar->tgl_keluar = $request->tgl_keluar;

     $barangkeluar->save();
     return redirect()->route('barangkeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangkeluar = barangkeluar::findOrFail($id);
        return view('barangkeluar.show', compact('barangkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangkeluar = barangkeluar::findOrFail($id);
        $barang = barang::all();
        return view('barangkeluar.edit', compact('barangkeluar', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ///validasi data
      $request->validate([
        'id_barang' => 'required',
        'jumlah' => 'required',
        'tgl_keluar' => 'required',
    ]);

     $barangkeluar = barangkeluar::findOrFail($id);
     $barangkeluar->id_barang = $request->id_barang;
     $barangkeluar->jumlah = $request->jumlah;
     $barangkeluar->tgl_keluar = $request->tgl_keluar;

     $barangkeluar->save();
     return redirect()->route('barangkeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangkeluar = barangkeluar::findOrFail($id);
        $barangkeluar->delete();
        return redirect()->route('barangkeluar.index');
    }
}
