<?php
namespace App\Controllers;

use App\Models\UploadModel;

class UploadController extends BaseController
{
    public function process()
    {
        session();
        // Ambil file yang diunggah dari form
        $file = $this->request->getFile('file');

        // Pastikan file valid dan belum dipindahkan
        if ($file->isValid() && !$file->hasMoved()) {
            // Generate nama baru untuk file
            $newName = $file->getRandomName();
            
            // Pindahkan file ke direktori yang diinginkan
            $file->move(WRITEPATH . 'uploads', $newName);

            // Simpan nama file ke dalam database
            $uploadModel = new UploadModel();
            $uploadModel->save([
                'file' => $newName
            ]);

            // Jika berhasil menyimpan, mungkin Anda ingin melakukan redirect atau memberikan pesan sukses
            return redirect()->to('/upload')->with('success', 'File berhasil diunggah.');
        } else {
            // Jika ada kesalahan, mungkin Anda ingin memberikan pesan kesalahan
            return redirect()->to('/upload')->with('error', 'Gagal mengunggah file.');
        }
    }
}

