<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Model
{
    use HasFactory;
    protected $visible =['nama_barang','jumlah','tgl_masuk'];
    protected $fillable =['nama_barang','jumlah','tgl_masuk'];
    public $timestamps = true;
    public function barang(){

        return $this->belongsTo('App\Models\barangmasuk','id_barangmasuk');
}
}
