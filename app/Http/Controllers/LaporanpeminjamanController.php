<?php

namespace App\Http\Controllers;
use App\Models\peminjaman;
use App\Models\laporanpeminjaman;
use Illuminate\Http\Request;

class LaporanpeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporanpeminjaman = laporanpeminjaman::with('peminjaman')->get();
        return view('laporanpeminjaman.index', compact('laporanpeminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laporanpeminjaman = laporanpeminjaman::all();
        $peminjaman = peminjaman::all();
        return view('laporanpeminjaman.create', compact('laporanpeminjaman','peminjaman'));
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
        'peminjam' => 'required',
        'status' => 'required,'
    ]);

     $laporanpeminjaman = new laporanpeminjaman;
     $laporanpeminjaman->id_peminjaman = $request->id_peminjaman;
     $laporanpeminjaman->status = $request->status;
     $laporanpeminjaman->save();
     return redirect()->route('laporanpeminjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laporanpeminjaman  $laporanpeminjaman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporanpeminjaman = laporanpeminjaman::findOrFail($id);
        return view('laporanpeminjaman.show', compact('laporanpeminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporanpeminjaman  $laporanpeminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporanpeminjaman = laporanpeminjaman::findOrFail($id);
        $peminjaman = peminjaman::all();
        return view('laporanpeminjaman.edit', compact('laporanpeminjaman', 'peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\laporanpeminjaman  $laporanpeminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validasi data
      $request->validate([
        'id_peminjaman' => 'required',
        'peminjam' => 'required',
        'status' => 'required,'
    ]);

     $laporanpeminjaman = laporanpeminjaman::findOrFail($id);
     $laporanpeminjaman->id_peminjaman = $request->id_peminjaman;
     $laporanpeminjaman->status = $request->status;
     $laporanpeminjaman->save();
     return redirect()->route('laporanpeminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporanpeminjaman  $laporanpeminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $laporanpeminjaman = laporanpeminjaman::findOrFail($id);
        $laporanpeminjaman->delete();
        return redirect()->route('laporanpeminjaman.index');
    }
}
