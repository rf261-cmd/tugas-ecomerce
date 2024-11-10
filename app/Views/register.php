<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>

.form-select {
              width: 230%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .form-select:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(0, 123, 255, .25);
        }


        body {
            background-image: url('https://via.placeholder.com/1920x1080'); /* Ganti URL dengan URL gambar Anda */
            background-size: cover; /* Membuat gambar latar belakang memenuhi seluruh area */
            background-position: center; /* Menentukan posisi gambar latar belakang */
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;




            
            
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user-plus mr-2"></i>Registrasi Akun 
                    </div>
                   <div class="card-body">
    <form action="home/register" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" id="nip" class="form-control"  value="<?= old('nip'); ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_pegawai">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="kd_bagian">Kd bagian</label>
            <input type="text" name="kd_bagian" id="kd_bagian" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="karyawan_tetap">Karyawan Tetap</option>
                        <option value="karyawan_kontrak">Karyawan Kontrak</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Tempatkan kolom untuk pengeluaran di sini jika diperlukan -->
            </div>
        </div>
    </div>
</div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>

        <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="jekel">Jekel</label>
            <input type="text" name="jekel" id="jekel" class="form-control" required>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="agama">Agama</label>
            <input type="text" name="agama" id="agama" class="form-control" required>
        </div>
    </div>
</div><br>
<button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>