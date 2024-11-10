<?= $this->extend('dashboard'); ?>
<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h3>Detail Mata Kuliah</h3>
            <?php if ($transaksi): ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $transaksi['nama_transaksi']; ?>
                                </h5>
                                <p class="card-text"><b>Jumlah SKS:
                                        <?= $transaksi['jumlah_sks']; ?>
                                    </b></p>
                                <p class="card-text">Dosen:
                                    <?= $transaksi['dosen_p']; ?>
                                </p>
                                
                                <a href="/transaksi/edit/<?= $transaksi['kd_transaksi']; ?>" class="btn btn-warning">Ubah</a>
                                <a href="/transaksi/delete/<?= $transaksi['kd_transaksi']; ?>" class="btn btn-danger">Hapus</a>
                                <br><br>
                                <p class="card-text"><small class="text-muted">
                                        <a href="/transaksi">Kembali</a></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p>Mata Kuliah tidak ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
