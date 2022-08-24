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
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembayaran_id');
            $table->string('alamat_detail',100);
            $table->bigInteger('harga');
            $table->date('tgl_pengiriman');
            $table->enum('status', ['1','2','3','4','5'])->comment('1 = belum dikirim ,2 dalam pengiriman, 3 = konfirmasi admin, 4 = konfirmasi user, 5 = gagal');
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
        Schema::dropIfExists('pengirimen');
    }
};
