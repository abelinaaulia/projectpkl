<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $visible =['id_barangmasuk','nama_barang','stok','kondisi'];
    protected $fillable =['id_barangmasuk','nama_barang','stok','kondisi'];
    public $timestamps = true;
    public function barangmasuk(){

        return $this->belongsTo('App\Models\barangmasuk','id_barangmasuk');
}
public function peminjaman(){

    return $this->belongsTo('App\Models\peminjaman','id_barang');
}
}
