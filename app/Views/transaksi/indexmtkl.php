<?= $this->extend('dashboard2'); ?>

<?= $this->section('isi'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container">
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

           

            <div class="card mt-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title">Daftar Pesanan</h5>
                </div>
                
           
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Id Transaksi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jenis Pembayaran</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                $totalPemasukan = 0;
                                $totalPengeluaran = 0;
                                foreach ($transaksi as $t):
                                    if ($t['status'] == 'Disetujui') {
                                        if ($t['jenis_transaksi'] == 'pemasukan') {
                                            $totalPemasukan += $t['jumlah'];
                                        } elseif ($t['jenis_transaksi'] == 'pengeluaran') {
                                            $totalPengeluaran += $t['jumlah'];
                                        }
                                    }
                            ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= date('d-m-Y', strtotime($t['tanggal_transaksi'])); ?></td>
                                <td><?= $t['nip']; ?></td>
                                <td><?= $t['id_transaksi']; ?></td>
                                <td><?= $t['keterangan']; ?></td>
                                <td><?= $t['jenis_transaksi']; ?></td>
                                <td><?= $t['jumlah']; ?></td>
                                <td>
                                    <span class="badge badge-<?= $t['status'] == 'Disetujui' ? 'success' : ($t['status'] == 'Ditolak' ? 'danger' : 'warning'); ?>">
                                        <?= $t['status']; ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($t['is_clicked']): ?>
                                        <button class="btn btn-secondary btn-sm" disabled>-</button>
                                    <?php else: ?>
                                        <form action="/transaksi/konfirmasi/<?= $t['id_transaksi']; ?>" method="post" style="display:inline;">
                                            <input type="hidden" name="status" value="Disetujui">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="/transaksi/konfirmasi/<?= $t['id_transaksi']; ?>" method="post" style="display:inline;">
                                            <input type="hidden" name="status" value="Ditolak">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
