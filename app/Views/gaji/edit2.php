<?= $this->extend('dashboard'); ?>
<?= $this->section('isi'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
/* Styling untuk Product Detail */
.product-detail-container {
    display: flex;
    background-color: #ffffff;
    width: 70%;
    max-width: 800px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
}

.product-image {
    flex: 1;
    padding-right: 20px;
}

.product-image img {
    width: 100%;
    max-width: 800px; /* Ubah dari 200px ke 400px untuk ukuran dua kali lebih besar */
    height: auto;
    border-radius: 10px;
}


.product-info {
    flex: 2;
    display: flex;
    flex-direction: column;
}

.product-info h1 {
    font-size: 24px;
    margin: 0;
}

.product-info .price {
    font-size: 20px;
    color: #555;
    margin: 10px 0;
}

.btn1 {
    padding: 10px;
    font-size: 16px;
    color: #ffffff;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}
.content-container {
    padding-bottom: 300px; /* Mengatur jarak antara konten dan footer */
}

</style>

<div class="container content-container">
    <!-- Product Grid -->
    <div class="product-grid">
        <div class="product-detail-container">
            <div class="product-image">
                <img src="<?= base_url('img/' . $gaji['gambar']); ?>" alt="Product Image" class="product-image-preview">
            </div>
            <div class="product-info">
                <h1><?= $gaji['Deskripsi']; ?></h1>
                <p class="product-price">Rp <?= number_format($gaji['gaji_bersih'], 0, ',', '.'); ?></p>
                <button class="btn1">Masukkan Ke Keranjang</button>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
