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
        Schema::create('t_jabatans', function (Blueprint $table) {
            $table->id();
            $table->char("kodeJabatan", length:4);
            $table->char("namaJabatan", length:15);
            $table->integer("gajiPokok");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_jabatans');
    }
};
