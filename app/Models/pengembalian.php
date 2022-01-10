<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;
    protected $visible =['id_peminjaman','tgl_kembali'];
    protected $fillable =['id_peminjaman','tgl_kembali'];
    public $timestamps = true;
    public function peminjaman(){

        return $this->belongsTo('App\Models\peminjaman','id_peminjaman');
}
}
