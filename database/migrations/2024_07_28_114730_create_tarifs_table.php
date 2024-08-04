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
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id('id_tarif');
            $table->integer('daya');
            $table->decimal('tarifperkwh', 8, 2);
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};
