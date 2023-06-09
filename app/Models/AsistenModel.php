<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenModel extends Model
{
    protected $table      = 'asisten';
    protected $allowedFields = ['NIM', 'NAMA', "PRAKTIKUM", "IPK"];
    
    // public function getAsisten($NAMA=false)
    // {
    //     if($NAMA==false){
    //         return $this->findAll();

    //     }
    //     return $this->where(['nama'=>$NAMA])->first();
    // }

    public function simpan($record)
    {
        $this->save([
            'NIM' => $record['nim'],
            'NAMA' => $record['nama'],
            'PRAKTIKUM' => $record['praktikum'],
            'IPK' => $record['ipk'],
        ]);
    }
    
    public function ambil($nim){
        return $this->where(['nim' => $nim])->first();
    }
}