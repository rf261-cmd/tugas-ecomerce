<?= $this->extend('dashboard'); ?>
<?= $this->section('isi'); ?>
<head>
    <!-- Tempatkan gaya CSS di sini -->
    <style>
        /* Gaya CSS untuk form */
        .form-select {
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
    </style>
</head>
<div class="container">
    <div class="col">
        <h3 class="text-center">Form Tambah Data</h3>
<br>
        <?= $validation->listErrors(); ?>

        <form action="/transaksi/simpan2" method="post">
            <?= csrf_field(); ?>
            
            <div class="row mb-3">
                <label for="id_transaksi" class="col-sm-2 col-form-label">Id transaksi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control <?= ($validation->hasError('id_transaksi')) ? 'is-invalid' : ''; ?>"
                        id="id_transaksi" name="id_transaksi" value="<?= old('id_transaksi'); ?>">
                    <div id="judulFeedBack" class="invalid-feedback">
                        <?= $validation->getError('id_transaksi'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>"
                        id="nip" name="nip" value="112" readonly>
                    <div id="judulFeedBack" class="invalid-feedback">
                        <?= $validation->getError('nip'); ?>
                    </div>
                </div>
            </div>

           

            <div class="row mb-3">
    <label for="tanggal_transaksi" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
    <div class="col-sm-6">
        <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
               value="<?= old('tanggal_transaksi'); ?>">
    </div>
</div>


<div class="row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                     value="<?= old('keterangan'); ?>">
                </div>
            </div>

            <div class="row mb-3">
    <label for="jenis_transaksi" class="col-sm-2 col-form-label">Jenis Transaksi</label>
    <div class="col-sm-6">
        <select class="form-select" id="jenis_transaksi" name="jenis_transaksi">
            <option value="">Pilih Jenis Transaksi</option>
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select>
    </div>
</div>


            <div class="row mb-3">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="jumlah" name="jumlah"
                     value="<?= old('jumlah'); ?>">
                </div>
            </div>
            <!-- Tambah field lainnya sesuai kebutuhan -->

            <button type="submit" class="btn btn-primary" style="width: 66%;">Simpan Data</button>

        </form>
        <br><br>
        <p class="card-text"> <small class="text-muted">
        <a href="/indexmtkl2" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali  </a>  </small></p>
    </div>
</div>

<?= $this->endSection(); ?>
