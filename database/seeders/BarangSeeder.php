<?php

namespace Database\Seeders;
use App\Models\barang;
use App\Models\barangmasuk;
use App\Models\barangkeluar;
use App\Models\peminjaman;
use App\Models\pengembalian;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat sample barangmasuk
        // $barangmasuk1 = barangmasuk::create(['nama_barang'=>'komputer','jumlah'=>50,'tgl_masuk'=>'2021-10-13']);
        // $barangmasuk2 = barangmasuk::create(['nama_barang'=>'laptop','jumlah'=>50,'tgl_masuk'=>'2021-09-14']);
        // $barangmasuk3 = barangmasuk::create(['nama_barang'=>'infokus','jumlah'=>5,'tgl_masuk'=>'2021-12-17']);

        // //membuat sample barang
        // $Barang1 = barang::create(['id_barangmasuk'=>$barangmasuk1->id,'nama_barang'=>'mouse','stok'=>250,'kondisi'=>'bagus']);
        // $Barang1 = barang::create(['id_barangmasuk'=>$barangmasuk2->id,'nama_barang'=>'keyboard','stok'=>250,'kondisi'=>'bagus']);
        // $Barang1 = barang::create(['id_barangmasuk'=>$barangmasuk3->id,'nama_barang'=>'cpu','stok'=>250,'kondisi'=>'bagus']);

        // //membuat sample barangkeluar
        // $Barangkeluar1 = barangkeluar::create(['id_barang'=>$Barang1->id,'jumlah'=>250,'tgl_keluar'=>'2021-08-08']);

        // //membuat sample peminjaman
        // $peminjaman1 = peminjaman::create(['id_barang'=>$Barang1->id,'peminjam'=>'risma','jk'=>'perempuan','no_telp'=>'085759266063','jumlah'=>250,'tgl_pinjam'=>'2022-02-02']);

        // //membuat sample pengembalian
        // $pengembalian = pengembalian::create(['id_peminjaman'=>$peminjaman1->id,'tgl_kembali'=>'2022-05-06']);
    }
}
