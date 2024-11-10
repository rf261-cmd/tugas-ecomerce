<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        helper(['form']);
        return view('login');
    }

    public function val_user()
    {
        $session_lg = session();
        $val_user = new UserModel();
        $nama_pegawai = $this->request->getVar('nama_pegawai');
        $password = $this->request->getVar('password');
        $data = $val_user->where('nama_pegawai', $nama_pegawai)->first();
        
        if($data) {
            echo "Data Ditemukan";
            if($data['password'] == $password) {
                echo "Password dan nama_pegawai benar";
                $ses_data = [
                    'nama_pegawai' => $data['nama_pegawai'],
                    'loged_in' => true
                ];
                $session_lg->set($ses_data);
                
                // Periksa apakah email cocok dengan salah satu dari email yang diinginkan
                if ($nama_pegawai === 'rafi') {
                    return redirect()->to('/indexmtkl4');
                } elseif ($nama_pegawai === 'atiz') {
                    return redirect()->to('/indexkls2');
                } else {
                    return redirect()->to('/dashboard3');
                }
            } else {
                echo "Password salah dan nip benar";
                return redirect()->to('/');
            }
        } else {
            echo "Data Tidak Ditemukan";
            return redirect()->to('/');
        }
    }


    public function dashboard2()
    {
        return view('indexmtkl4');
    }

    public function dashboard3()
    {
        return view('dashboard3');
    }
    
    public function dashboard()
    {
        return view('indexkls2');
    }


    public function logout_ac()
    {
        $session_lg = session();
        $session_lg->destroy();
        return redirect()->to('/');
    }
    
    public function tables_db()
    {
        $val_user = new UserModel();
        $session_lg = session();
        $data = [
            'nama' => $session_lg->get('nama_pegawai'),
            'dt_user'=> $val_user->findAll(),
        ];
        return view ('tables',$data);
    }
    
    public function dt_user()
    {
        $val_user = new UserModel();
        $data = $val_user->findAll();
        return json_encode($data);
    }

    public function register()
    {
        // Validasi input (contoh sederhana)
        $validationRules = [
            'nip' => 'required',
            'password' => 'required',
            'kd_bagian' => 'required',
            'nama_pegawai' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required', 
            'jekel' => 'required', 
            'telepon' => 'required',
            'agama' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke halaman register dengan pesan error
            return redirect()->to('/register')->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama_bagian' => $this->request->getVar('nama_bagian'),
            'password' => $this->request->getVar('password'),
            'kd_bagian' => $this->request->getVar('kd_bagian'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'status' => $this->request->getVar('status'),
            'alamat' => $this->request->getVar('alamat'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jekel' => $this->request->getVar('jekel'),
            'telepon' => $this->request->getVar('telepon'),
            'agama' => $this->request->getVar('agama'),
        ];

        // Simpan data pengguna ke dalam database atau lakukan tindakan lain sesuai kebutuhan aplikasi
        $this->UserModel->save($data);

        // Redirect ke halaman login setelah pendaftaran berhasil
        return redirect()->to('login')->with('success', 'Pendaftaran berhasil!');
    }

    public function showRegisterForm()
    {
        // Tampilkan halaman pendaftaran (register.php)
        return view('register');
    }

    public function success()
    {
        return view('login'); // Ganti 'success_page' dengan nama file tampilan yang sesuai
    }

    
}
