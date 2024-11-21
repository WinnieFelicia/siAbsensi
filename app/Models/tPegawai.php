<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tPegawai extends Model
{
    use HasFactory;
    protected $fillable = ['kodePegawai','namaPegawai','alamatPegawai','jenisKelamin','tempatLahir','tanggalLahir','agama','jabatan','noHP'];
}
