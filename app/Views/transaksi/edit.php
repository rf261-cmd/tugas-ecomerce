<?= $this->extend('dashboard'); ?>
<?= $this->section('isi'); ?>

<div class="container">
    <div class="col">
        <h3 class="text-center">Edit Data Mata Kuliah</h3>
        

        <form action="/transaksi/update/<?= $transaksi['kd_transaksi']; ?>" method="post">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label for="nama_transaksi" class="col-sm-2 col-form-label">Nama Mata Kuliah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_transaksi')) ? 'is-invalid' : ''; ?>"
                        id="nama_transaksi" name="nama_transaksi" value="<?= old('nama_transaksi') ?? $transaksi['nama_transaksi']; ?>">
                    <div id="judulFeedBack" class="invalid-feedback">
                        
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="jumlah_sks" class="col-sm-2 col-form-label">Jumlah SKS</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="jumlah_sks" name="jumlah-sks"
                        value="<?= old('jumlah_sks') ?? $transaksi['jumlah_sks']; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="dosen_p" class="col-sm-2 col-form-label">Dosen</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="dosen_p" name="dosen_p"
                        value="<?= old('dosen_p') ?? $transaksi['dosen_p']; ?>">
                </div>
            </div>

            
            <!-- Tambah field lainnya sesuai kebutuhan -->

            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
        <p class="card-text"><small class="text-muted">
                                        <a href="/transaksi">Kembali</a></small></p>
    </div>
</div>

<?= $this->endSection(); ?>
