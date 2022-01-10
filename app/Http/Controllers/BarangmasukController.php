<?php

namespace App\Http\Controllers;
use App\Models\barang;
use App\Models\barangmasuk;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = barangmasuk::all();
        return view('barangmasuk.index', compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barangmasuk.create');
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
        $validated = $request->validate([
           'nama_barang' => 'required',
           'jumlah' => 'required',
           'tgl_masuk' => 'required',
       ]);

        $barangmasuk = new Barangmasuk;
        $barangmasuk->nama_barang = $request->nama_barang;
        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->tgl_masuk = $request->tgl_masuk;
        $barangmasuk->save();
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangmasuk = barangmasuk::findOrFail($id);
        return view('barangmasuk.show', compact('barangmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangmasuk = barangmasuk::findOrFail($id);
        return view('barangmasuk.edit', compact('barangmasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi data
        $validated = $request->validate([
           'nama_barang' => 'required',
           'jumlah' => 'required',
           'tgl_masuk' => 'required',
       ]);

        $barangmasuk = barangmasuk::findOrFail($id);
        $barangmasuk->nama_barang = $request->nama_barang;
        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->tgl_masuk = $request->tgl_masuk;
        $barangmasuk->save();
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangmasuk = barangmasuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('barangmasuk.index');
    }
}
