<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\KaryawanModel;
use App\Models\GajiModel; 
use Dompdf\Dompdf;
use Dompdf\Options;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $karyawanModel;
    protected $gajiModel;
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->karyawanModel = new KaryawanModel();
        $this->gajiModel = new GajiModel();
    }

    public function indexmtkl2()
    {
        // Mengambil total saldo yang disetujui
        $totalSaldoDisetujui = $this->transaksiModel->gettotalSaldoDisetujui('112');
    
        // Mengirim data transaksi dan total saldo yang disetujui ke view
        $data = [
            'transaksi' => $this->transaksiModel->where('nip', '112')->findAll(),
            'totalSaldoDisetujui' => $totalSaldoDisetujui['jumlah'] ?? 0, // Mengambil jumlah dari hasil query
            'gaji' => $this->gajiModel->findAll()
        ];
        
        return view('transaksi/indexmtkl2', $data);
    }

    public function indexmtkl()
    {
        $data = [
            'transaksi' => $this->transaksiModel->gettransaksi()
        ];
        
        // Ambil data dari form jika ada
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

        // Cek apakah form telah di-submit
        if (!empty($startDate) && !empty($endDate)) {
            // Ambil data transaksi berdasarkan rentang tanggal
            $transaksi = $this->transaksiModel
                ->where('tanggal_transaksi >=', $startDate)
                ->where('tanggal_transaksi <=', $endDate)
                ->findAll();

            // Simpan data transaksi dalam array $data untuk dikirim ke view
            $data['transaksi'] = $transaksi;
        }

        return view('transaksi/indexmtkl', $data);
    }
    public function indexmtkl3()
    {
        $data = [
            'transaksi' => $this->transaksiModel->gettransaksi()
        ];
        
        // Ambil data dari form jika ada
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

        // Cek apakah form telah di-submit
        if (!empty($startDate) && !empty($endDate)) {
            // Ambil data transaksi berdasarkan rentang tanggal
            $transaksi = $this->transaksiModel
                ->where('tanggal_transaksi >=', $startDate)
                ->where('tanggal_transaksi <=', $endDate)
                ->findAll();

            // Simpan data transaksi dalam array $data untuk dikirim ke view
            $data['transaksi'] = $transaksi;
        }

        return view('transaksi/indexmtkl3', $data);
    }
    public function indexmtkl4()
    {
         // Mengambil total saldo yang disetujui
         $totalSaldoDisetujui = $this->transaksiModel->gettotalSaldoDisetujui('112');
    
         // Mengirim data transaksi dan total saldo yang disetujui ke view
         $data = [
             'transaksi' => $this->transaksiModel->where('nip', '112')->findAll(),
             'totalSaldoDisetujui' => $totalSaldoDisetujui['jumlah'] ?? 0, // Mengambil jumlah dari hasil query
             'gaji' => $this->gajiModel->findAll()
         ];

        return view('transaksi/indexmtkl4', $data);
    }

    public function indexpakaian()
    {
        // Mengambil total saldo yang disetujui
        $totalSaldoDisetujui = $this->transaksiModel->gettotalSaldoDisetujui('112');
    
        // Mengirim data transaksi dan total saldo yang disetujui ke view
        $data = [
            'transaksi' => $this->transaksiModel->where('nip', '112')->findAll(),
            'totalSaldoDisetujui' => $totalSaldoDisetujui['jumlah'] ?? 0, // Mengambil jumlah dari hasil query
            'gaji' => $this->gajiModel->findAll()
        ];
        

        return view('transaksi/indexpakaian', $data);
    }

    public function indexsepatu()
    {
        // Mengambil total saldo yang disetujui
        $totalSaldoDisetujui = $this->transaksiModel->gettotalSaldoDisetujui('112');
    
        // Mengirim data transaksi dan total saldo yang disetujui ke view
        $data = [
            'transaksi' => $this->transaksiModel->where('nip', '112')->findAll(),
            'totalSaldoDisetujui' => $totalSaldoDisetujui['jumlah'] ?? 0, // Mengambil jumlah dari hasil query
            'gaji' => $this->gajiModel->findAll()
        ];
        

        return view('transaksi/indexsepatu', $data);
    }

    public function indexaksesoris()
    {
        // Mengambil total saldo yang disetujui
        $totalSaldoDisetujui = $this->transaksiModel->gettotalSaldoDisetujui('112');
    
        // Mengirim data transaksi dan total saldo yang disetujui ke view
        $data = [
            'transaksi' => $this->transaksiModel->where('nip', '112')->findAll(),
            'totalSaldoDisetujui' => $totalSaldoDisetujui['jumlah'] ?? 0, // Mengambil jumlah dari hasil query
            'gaji' => $this->gajiModel->findAll()
        ];
        

        return view('transaksi/indexaksesoris', $data);
    }
    public function details($id)
{
    $data = [
        'gaji' => $this->gajiModel->getgaji($id)
    ];
    return view('transaksi/details', $data);
}


    public function tambahmtkl()
    {
        // Mendapatkan data karyawan dari model atau dari sumber lain
        $karyawan = $this->karyawanModel->findAll(); // Misalnya, mengambil semua data karyawan dari database
        
        $data = [
            'title' => 'Tambah data transaksi',
            'karyawan' => $karyawan, // Mengirimkan data karyawan ke view
            'validation' => \Config\Services::validation()
        ];

        return view('transaksi/tambahmtkl', $data);
    }
    public function tambahmtkl2()
    {
        // Mendapatkan data karyawan dari model atau dari sumber lain
        $karyawan = $this->karyawanModel->findAll(); // Misalnya, mengambil semua data karyawan dari database
        
        $data = [
            'title' => 'Tambah data transaksi',
            'karyawan' => $karyawan, // Mengirimkan data karyawan ke view
            'validation' => \Config\Services::validation()
        ];

        return view('transaksi/tambahmtkl2', $data);
    }
    public function simpan()
    {
        $validationRules = [
            'nip' => 'required',
            'tanggal_transaksi' => 'required',
            'keterangan' => 'required',
            'jenis_transaksi' => 'required',
            'jumlah' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('pesan', 'Data tidak valid');
            return redirect()->to('/transaksi/tambahmtkl')->withInput()->with('validation', $validation);
        }

        // Mendapatkan data karyawan dari model atau dari sumber lain
        $karyawan = $this->karyawanModel->findAll(); // Misalnya, mengambil semua data karyawan dari database
        
        $this->transaksiModel->save([
            'nip' => $this->request->getVar('nip'),
            'tanggal_transaksi' => $this->request->getVar('tanggal_transaksi'),
            'keterangan' => $this->request->getVar('keterangan'),
            'jumlah' => $this->request->getVar('jumlah'),
            'jenis_transaksi' => $this->request->getVar('jenis_transaksi'),
            'status' => 'pending' // Status awal transaksi adalah pending
        ]);

        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('/transaksi');
    }

    public function simpan2()
    {
        $validationRules = [
            'nip' => 'required',
            'tanggal_transaksi' => 'required',
            'keterangan' => 'required',
            'jenis_transaksi' => 'required',
            'jumlah' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('pesan', 'Data tidak valid');
            return redirect()->to('/transaksi/tambahmtkl2')->withInput()->with('validation', $validation);
        }

        // Mendapatkan data karyawan dari model atau dari sumber lain
        $karyawan = $this->karyawanModel->findAll(); // Misalnya, mengambil semua data karyawan dari database
        
        $this->transaksiModel->save([
            'nip' => $this->request->getVar('nip'),
            'tanggal_transaksi' => $this->request->getVar('tanggal_transaksi'),
            'keterangan' => $this->request->getVar('keterangan'),
            'jumlah' => $this->request->getVar('jumlah'),
            'jenis_transaksi' => $this->request->getVar('jenis_transaksi'),
            'status' => 'pending' // Status awal transaksi adalah pending
        ]);

        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('/indexmtkl2');
    }



    public function delete($id_transaksi)
    {
        $this->transaksiModel->delete($id_transaksi);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/transaksi');
    }

    // Metode konfirmasi untuk menyetujui atau menolak transaksi
    public function konfirmasi($id_transaksi)
    {
        $status = $this->request->getPost('status');
        
        if ($this->transaksiModel->update($id_transaksi, ['status' => $status, 'is_clicked' => true])) {
            session()->setFlashdata('pesan', 'Status transaksi berhasil diperbarui.');
        } else {
            session()->setFlashdata('pesan', 'Gagal memperbarui status transaksi.');
        }
        
        return redirect()->to('/transaksi');
    }
    public function generatepdf()
    {
        echo "generatepdf method called";
        exit;
        // Fetch data from the database or any other source
        $data['transaksi'] = $this->transaksiModel->findAll();

        // Load view into a variable
        $html = view('transaksi/pdf_report', $data);

        // Configure Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true); // Enable remote files if needed for CSS/fonts

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // Render the HTML as PDF
        $dompdf->render();

        // Set up the file name for download
        $pdfFileName = 'laporan_transaksi_' . time() . '.pdf';

        // Output the generated PDF to Browser
        $dompdf->stream($pdfFileName, ['Attachment' => true]);

        // Return a response to prevent further code execution
        return;
    }
    

} 
   
