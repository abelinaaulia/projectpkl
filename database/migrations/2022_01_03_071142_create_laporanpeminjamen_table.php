<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanpeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporanpeminjamen', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_peminjaman')->unsigned();
            $table->date('status');
            $table->foreign('id_peminjaman')->references('id')->
            on('peminjamen')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporanpeminjamen');
    }
}
