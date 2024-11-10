<?= $this->extend('dashboard2'); ?>

<?= $this->section('isi'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ulasan Pelanggan</h1>

    <!-- Tabel Ulasan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Ulasan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Produk</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th>Tanggal Ulasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Jesse Pinkman</td>
                            <td>Sepatu Adidas Samba</td>
                            <td>⭐⭐⭐⭐⭐</td>
                            <td>Produk sesuai deskripsi dan sangat nyaman dipakai!</td>
                            <td>10 Oktober 2024</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>SKylar</td>
                            <td>Jaket Windbraker The NorthFace</td>
                            <td>⭐⭐⭐⭐</td>
                            <td>Jaket bagus, tapi sayang ternyata kebesaran.</td>
                            <td>12 Oktober 2024</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                        <!-- Tambahkan lebih banyak ulasan di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
