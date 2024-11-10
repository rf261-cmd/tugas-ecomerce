<?= $this->extend('dashboard2'); ?>
<?= $this->section('isi'); ?>
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
<div class="container">
    <div class="col">
        <h3 class="text-center">Form Tambah data</h3>
        <br>
        <?= $validation->listErrors(); ?>

        <form action="/gaji/simpan" method="post">
            <?= csrf_field(); ?>
           
            <div class="row mb-3">
                <label for="id" class="col-sm-2 col-form-label">id </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="id" name="id" value="<?= old('id'); ?>">
                </div>
            </div>
           

            <div class="row mb-3">
    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-6">
        <!-- Ubah input menjadi select -->
        <select class="form-select <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" id="nip" name="nip">
            <option value="">Pilih NIP</option>
            <!-- Tampilkan opsi dari data karyawan -->
            <?php foreach ($karyawan as $row): ?>
                <option value="<?= $row['nip']; ?>" <?= (old('nip') == $row['nip']) ? 'selected' : ''; ?>>
                    <?= $row['nip']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div id="judulFeedBack" class="invalid-feedback">
            <?= $validation->getError('nip'); ?>
        </div>
    </div>
</div>

            <div class="row mb-3">
    <label for="kd_bagian" class="col-sm-2 col-form-label">KD Bagian</label>
    <div class="col-sm-6">
        <!-- Ubah input menjadi select -->
        <select class="form-select <?= ($validation->hasError('kd_bagian')) ? 'is-invalid' : ''; ?>" id="kd_bagian" name="kd_bagian">
            <option value="">Pilih KD Bagian</option>
            <!-- Tampilkan opsi dari data bagian -->
            <?php foreach ($bagian as $row): ?>
                <option value="<?= $row['kd_bagian']; ?>" <?= (old('kd_bagian') == $row['kd_bagian']) ? 'selected' : ''; ?>>
                    <?= $row['kd_bagian']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div id="judulFeedBack" class="invalid-feedback">
            <?= $validation->getError('kd_bagian'); ?>
        </div>
    </div>
</div>


            <div class="row mb-3">
                <label for="gaji_bersih" class="col-sm-2 col-form-label"> Gaji Bersih</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="gaji_bersih" name="gaji_bersih" value="<?= old('gaji_bersih'); ?>">
                </div>
            </div>

            <!-- Tambah field lainnya sesuai kebutuhan -->
            <br>
            <button type="submit" class="btn btn-primary" style="width: 66%;">Simpan Data</button>
        </form>
        <br><br>
        <p class="card-text"> <small class="text-muted">
        <a href="/gaji" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </small>
</p>

    </div>
</div>

<?= $this->endSection(); ?>
