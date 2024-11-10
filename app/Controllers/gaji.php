<?php

namespace App\Controllers;

use App\Models\gajiModel;
use App\Models\BagianModel;
use App\Models\KaryawanModel;
use App\Models\UploadModel;

class gaji extends BaseController
{
    protected $gajiModel;
    protected $bagianModel; 
    protected $karyawanModel; 
    protected $uploadModel; 

    public function __construct()
    {
        $this->gajiModel = new gajiModel();
        $this->bagianModel = new BagianModel();
        $this->karyawanModel = new KaryawanModel(); 
        $this->uploadModel = new uploadModel(); 
    }

    public function indexkls()
    {
        $data = [
            'gaji' => $this->gajiModel->getgaji()
        ];
        return view('gaji/indexkls', $data);
    }
    public function indexkls2()
    {
        $data = [
            'gaji' => $this->gajiModel->getgaji()
        ];
        return view('gaji/indexkls2', $data);
    }
    public function keranjang()
    {
        $data = [
            'gaji' => $this->gajiModel->getgaji()
        ];
        return view('gaji/keranjang', $data);
    }
    public function tambahgaji()
    {
        $karyawan = $this->karyawanModel->findAll();
        $bagian = $this->bagianModel->findAll();
    
        $data = [
            'title' => 'Tambah data gaji',
            'karyawan' => $karyawan,
            'bagian' => $bagian,
            'validation' => \Config\Services::validation()
        ];
    
        return view('gaji/tambahgaji', $data);
    }
    
    public function simpan()
    {
        // Validasi input
        $validationRules = [
            'nip' => 'required',
            'kd_bagian' => 'required',
            'gaji_bersih' => 'required',
            'gambar' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]' // Validasi gambar
        ];
    
        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke halaman tambahgaji dengan pesan kesalahan
            // dan data input sebelumnya
            $validation = \Config\Services::validation();
            return redirect()->to('/gaji/tambahgaji')->withInput()->with('validation', $validation);
        }

        // Mendapatkan data karyawan dan bagian dari model
        $karyawanModel = new KaryawanModel();
        $karyawan = $karyawanModel->findAll();
        $bagianModel = new KaryawanModel();
        $bagian = $bagianModel->findAll();

        // Menangkap file gambar
        $fileGambar = $this->request->getFile('gambar');
        $fileName = $fileGambar->getRandomName(); // Membuat nama file acak

        // Memindahkan file ke folder public/img
        $fileGambar->move('img', $fileName);

        // Menyimpan data ke database
        $this->gajiModel->save([
            'nip' => $this->request->getVar('nip'),
            'kd_bagian' => $this->request->getVar('kd_bagian'),
            'gaji_bersih' => $this->request->getVar('gaji_bersih'),
            'gambar' => $fileName // Simpan nama file gambar
        ]);
        
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('/gaji');
    }

    public function edit($id)
    {
        $karyawan = $this->karyawanModel->findAll();
        $bagian = $this->bagianModel->findAll();
    
        $data = [
            'title' => 'Edit data gaji',
            'gaji' => $this->gajiModel->getgaji($id),
            'karyawan' => $karyawan,
            'bagian' => $bagian,
            'validation' => \Config\Services::validation()
        ];
        
        return view('gaji/edit', $data);
    }

    public function edit2($id)
    {
        $karyawan = $this->karyawanModel->findAll();
        $bagian = $this->bagianModel->findAll();
    
        $data = [
            'title' => 'Edit data gaji',
            'gaji' => $this->gajiModel->getgaji($id),
            'karyawan' => $karyawan,
            'bagian' => $bagian,
            'validation' => \Config\Services::validation()
        ];
        
        return view('gaji/edit2', $data);
    }
    

    public function update($id)
    {
        // Menangkap file gambar baru jika diupload
        $fileGambar = $this->request->getFile('gambar');
        $dataToUpdate = [
            'nip' => $this->request->getVar('nip'),
            'kd_bagian' => $this->request->getVar('kd_bagian'),
            'gaji_bersih' => $this->request->getVar('gaji_bersih')
        ];

        if ($fileGambar && $fileGambar->isValid()) {
            $fileName = $fileGambar->getRandomName(); // Membuat nama file acak
            $fileGambar->move('img', $fileName);
            $dataToUpdate['gambar'] = $fileName; // Menambahkan nama file gambar
        }

        $this->gajiModel->update($id, $dataToUpdate);

        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('/gaji');
    }

    public function delete($id)
    {
        // Hapus gambar jika ada
        $gajiData = $this->gajiModel->find($id);
        if ($gajiData['gambar']) {
            // Hapus file gambar dari server
            unlink('img/' . $gajiData['gambar']);
        }

        $this->gajiModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/gaji');
    }
}
