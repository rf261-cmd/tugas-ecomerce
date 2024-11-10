<?php

namespace App\Models;

use CodeIgniter\Model;

class bagianModel extends Model
{
    protected $table = 'bagian';
    protected $primaryKey = 'kd_bagian'; // Perubahan di sini
    protected $allowedFields = ['nama_bagian'];

    public function getbagian ($kd_bagian = false)
    {
        if ($kd_bagian == false) {
            return $this->findAll();
        }
        return $this->where(['kd_bagian' => $kd_bagian])->first();
    }
}

