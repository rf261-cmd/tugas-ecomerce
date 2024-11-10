<?= $this->extend('dashboard2'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <h3 class="mb-4">Keranjang</h3>
           

            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                       
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Foto Produk</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                          
                            foreach ($gaji as $k):
                            ?>
                            <tr>
                                <td></td>
                                <td>
                                    <img src="<?= base_url('img/' . $k['gambar']) ?>" 
                                         alt="Gambar" width="75" 
                                         class="img-thumbnail img-hover" 
                                         style="transition: transform 0.3s;">
                                </td>
                                <td><?= $k['Deskripsi']; ?></td>
                                <td><?= $k['gaji_bersih']; ?></td>
                                <td>
                                    
                                <a href="/gaji/delete/<?= $k['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
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

<!-- CSS tambahan -->
<style>
    .img-hover:hover {
        transform: scale(1.1);
    }
</style>

<!-- Script untuk Toggle Date Range -->
<script>
    document.getElementById('toggleDateRange').addEventListener('click', function() {
        var dateRangeForm = document.getElementById('dateRangeForm');
        if (dateRangeForm.style.display === 'none' || dateRangeForm.style.display === '') {
            dateRangeForm.style.display = 'block';
        } else {
            dateRangeForm.style.display = 'none';
        }
    });
</script>
