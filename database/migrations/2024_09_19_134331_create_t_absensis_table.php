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
        Schema::create('t_absensis', function (Blueprint $table) {
            $table->id();
            $table->char("statusAbsensi", length:10);
            $table->date("tglAbsensi");
            $table->text("keterangan");
            $table->integer("pegawai");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_absensis');
    }
};
