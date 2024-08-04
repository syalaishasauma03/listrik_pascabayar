<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->string('nomor_kwh');
            $table->string('nama_pelanggan');
            $table->string('alamat');
            $table->unsignedBigInteger('id_tarif');
            $table->timestamps();

            $table->foreign('id_tarif')->references('id_tarif')->on('tarifs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
