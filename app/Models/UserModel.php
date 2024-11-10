<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'karyawan';
    protected $primarykey = 'nip';
    protected $allowedField = ['nip','nama_pegawai','password',	'kd_bagian',
    'status',	'alamat',	'tgl_lahir',	'jekel',	'telepon',	'agama'];

public function getUser($nip = false) {
    if ($nip == false) {
        return $this->findAll();        
    }
}
}
