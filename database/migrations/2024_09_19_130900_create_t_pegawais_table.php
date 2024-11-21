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
        Schema::create('t_pegawais', function (Blueprint $table) {
            $table->id();
            $table->char("kodePegawai", length:4);
            $table->char("namaPegawai", length:30);
            $table->text("alamatPegawai");
            $table->char("jenisKelamin", length:6);
            $table->char("tempatLahir", length:30);
            $table->date("tanggalLahir");
            $table->char("agama", length:15);
            $table->integer("jabatan");
            $table->char("noHP", length:18);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pegawais');
    }
};
