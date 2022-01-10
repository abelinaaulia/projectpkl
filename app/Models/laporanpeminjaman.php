<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanpeminjaman extends Model
{
    use HasFactory;
    protected $visible =['id_peminjaman','status'];
    protected $fillable =['id_peminjaman','status'];
    public $timestamps = true;
    public function peminjaman(){

        return $this->belongsTo('App\Models\peminajaman','id_peminjaman');
}
}
