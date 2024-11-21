<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tGaji extends Model
{
    use HasFactory;
    protected $fillable = ['periodeGaji','incentive','gajiPokok','persenBPJS','rupiahBPJS','hariAlpha','rupiahPerharialpha','totalRupiahalpha','totalGaji','tglHitung','pegawai'];
}

