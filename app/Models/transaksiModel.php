<?php

namespace App\Models;

use CodeIgniter\Model;

class transaksiModel extends Model
{
    protected $table = 'transaksi_keuangan';
    protected $primaryKey = 'id_transaksi'; // Perubahan di sini
    protected $allowedFields = ['tanggal_transaksi', 'keterangan', 'jenis_transaksi','jumlah','nip','status','is_clicked'];

    public function gettransaksi($id_transaksi = false)
    {
        if ($id_transaksi == false) {
            return $this->findAll();
        }
        return $this->where(['id_transaksi' => $id_transaksi])->first();
    }
    public function updateStatus($id, $status) {
        return $this->update($id, ['status' => $status]);
}
public function gettotalSaldoDisetujui($nip)
{
    return $this->where('nip', $nip)
                ->where('status', 'disetujui')
                ->selectSum('jumlah')
                ->first();
}

}