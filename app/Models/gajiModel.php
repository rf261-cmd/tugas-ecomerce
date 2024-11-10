<?php

namespace App\Models;

use CodeIgniter\Model;

class gajiModel extends Model
{
    protected $table = 'gaji';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['nip', 'kd_bagian', 'gaji_bersih','status','deskripsi','gambar',];

    public function getgaji($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
   
}
