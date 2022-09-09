<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('gambar',100);
            $table->string('nama_barang',30);
            $table->string('kode_barang',20);
            $table->string('harga');
            $table->integer('stock');
            $table->string('deskripsi', 100);
            $table->foreignId('satuan_id');
            $table->foreignId('jenis_id');
            $table->date('tgl_perolehan');
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
        Schema::dropIfExists('barangs');
    }
};
