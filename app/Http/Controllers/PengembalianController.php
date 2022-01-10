<?php

namespace App\Http\Controllers;
use App\Models\peminjaman;
use App\Models\pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = pengembalian::with('peminjaman')->get();
        return view('pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengembalian = pengembalian::all();
        $peminjaman = peminjaman::all();
        return view('pengembalian.create', compact('pengembalian','peminjaman'));
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
        'id_peminjaman' => 'required',
        'tgl_kembali' => 'required',
    ]);
     $pengembalian = new pengembalian;
     $pengembalian->id_peminjaman = $request->id_peminjaman;
     $pengembalian->tgl_kembali = $request->tgl_kembali;

     $pengembalian->save();
     return redirect()->route('pengembalian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengembalian = pengembalian::findOrFail($id);
        return view('pengembalian.show', compact('pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengembalian = pengembalian::findOrFail($id);
        $peminjaman = peminjaman::all();
        return view('pengembalian.edit', compact('pengembalian', 'peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //validasi data
      $request->validate([
        'id_peminjaman' => 'required',
        'tgl_kembali' => 'required',
    ]);
     $pengembalian = pengembalian::findOrFail($id);
     $pengembalian->id_peminjaman = $request->id_peminjaman;
     $pengembalian->tgl_kembali = $request->tgl_kembali;

     $pengembalian->save();
     return redirect()->route('pengembalian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengembalian = pengembalian::findOrFail($id);
        $pengembalian->delete();
        return redirect()->route('pengembalian.index');
    }
}
