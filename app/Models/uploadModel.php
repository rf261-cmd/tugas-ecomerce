<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadModel extends Model
{
    protected $table = 'dokumen';
    protected $primaryKey = 'id';
    protected $allowedFields = ['file'];

    // Tambahkan lebih banyak metode jika diperlukan
}
