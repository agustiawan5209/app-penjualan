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
        Schema::create('status_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ongkir_id')->nullable();
            $table->foreignId('pembayaran_id')->nullable();
            $table->string('ket', 50)->nullable();
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
        Schema::dropIfExists('status_barangs');
    }
};
