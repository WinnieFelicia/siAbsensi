<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tAbsensi extends Model
{
    use HasFactory;
    protected $fillable = ['statusAbsensi','tglAbsensi','keterangan', 'pegawai'];
}
