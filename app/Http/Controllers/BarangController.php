<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\peminjaman;
use App\Models\barangmasuk;
use App\Models\barangkeluar;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::with('barangmasuk')->get();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        $barangmasuk = barangmasuk::all();
        return view('barang.create', compact('barang','barangmasuk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //validasi data
      $request->validate([
         'id_barangmasuk' => 'required',
         'nama_barang' => 'required',
         'stok' => 'required',
         'kondisi' => 'required',

     ]);

     $barang = new barang;
     $barang->id_barangmasuk = $request->id_barangmasuk;
     $barang->nama_barang = $request->nama_barang;
     $barang->stok = $request->stok;
     $barang->kondisi = $request->kondisi;

     $barang->save();
     return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = barang::findOrFail($id);
        $barangmasuk = barangmasuk::all();
        return view('barang.edit', compact('barang','barangmasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi data
        $validated = $request->validate([
            'id_barangmasuk' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required',
            'kondisi' => 'required',

        ]);

         $barang = barang::findOrFail($id);
         $barang->id_barangmasuk = $request->id_barangmasuk;
         $barang->nama_barang = $request->nama_barang;
         $barang->stok = $request->stok;
         $barang->kondisi = $request->kondisi;

         $barang->save();
         return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
