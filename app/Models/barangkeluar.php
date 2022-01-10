<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangkeluar extends Model
{
    use HasFactory;
    protected $visible =['id_barang','jumlah','tgl_keluar'];
    protected $fillable =['id_barang','jumlah','tgl_keluar'];
    public $timestamps = true;
    public function barangkeluar(){

        return $this->belongsTo('App\Models\barangkeluar','id_barang');
}
public function barang(){

    return $this->belongsTo('App\Models\barang','id_barang');
}
}
