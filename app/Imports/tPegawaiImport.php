<?php

namespace App\Imports;

use App\Models\tPegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class tPegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $rowCount=0;
    public function model(array $row)
    {
        $this->rowCount++;
        if($this->rowCount>1 && isset($row[0])){
        return new tPegawai([
            'kodePegawai' => $row['0'],
            'namaPegawai' => $row['1'],
            'alamatPegawai' => $row['2'],
            'jenisKelamin' => $row['3'],
            'tempatLahir' => $row['4'],
            'tanggalLahir' => $row['5'],
            'agama' => $row['6'],
            'jabatan' => $row['7'],
            'noHP' => $row['8'],
        ]);}
    }
}
