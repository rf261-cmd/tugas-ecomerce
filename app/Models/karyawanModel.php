<?php

namespace App\Models;

use CodeIgniter\Model;

class karyawanModel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'nip'; // Perubahan di sini
    protected $allowedFields = ['nip', 'nama_pegawai','password', 'kd_bagian',
    'status','alamat','tgl_lahir','jekel','telepon','agama'];

    public function getkaryawan ($nip = false)
    {
        if ($nip == false) {
            return $this->findAll();
        }
        return $this->where(['nip' => $nip])->first();
    }
}
