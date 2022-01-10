<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $visible =['id_barang','peminjam','jk','no_telp','jumlah','tgl_pinjam'];
    protected $fillable =['id_barang','peminjam','jk','no_telp','jumlah','tgl_pinjam'];
    public $timestamps = true;
    public function barang(){

        return $this->belongsTo('App\Models\barang','id_barang');
}
}
