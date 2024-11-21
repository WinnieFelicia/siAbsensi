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
        Schema::create('t_gajis', function (Blueprint $table) {
            $table->id();
            $table->text('periodeGaji');
            $table->integer('incentive');
            $table->integer('gajiPokok');
            $table->boolean('persenBPJS');
            $table->integer('rupiahBPJS');
            $table->char('hariAlpha', length:10);
            $table->integer('rupiahPerharialpha');
            $table->integer('totalRupiahalpha');
            $table->integer('totalGaji');
            $table->date('tglHitung');
            $table->integer('pegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_gajis');
    }
};
