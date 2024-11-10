<?= $this->extend('dashboard'); ?>
<?= $this->section('isi'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* Reset margin and padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        ;
    }

    /* Main container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        margin-bottom: 165px;
    }

    /* Heading styling */
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    /* Product grid */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    /* Individual product card */
    .product-card {
        background-color: #fff;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 10px;
        text-align: center;
    }

    /* Product image */
    .product-card img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    /* Product details */
    .product-details {
        font-size: 14px;
        color: #333;
    }

    /* Price styling */
    .product-price {
        font-size: 18px;
        font-weight: bold;
        color: #C37129;
        margin: 10px 0;
    }

    /* Buy button */
    .buy-button {
        background-color: #C37129;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        text-transform: uppercase;
    }

    .buy-button:hover {
        background-color: #d35400;
    }
</style>
<div class="container">

    <!-- Product Grid -->
    <div class="product-grid">
    <?php foreach ($gaji as $item): ?>
       
        <!-- Product 1: Baju -->
        <div class="product-card">
        <img src="<?= base_url('img/' . $item['gambar']); ?>" 
        alt="<?= $item['Deskripsi']; ?>" class="img-thumbnail" style="height: 300px; width: auto;">
        <div class="product-details">
                <p><strong><?= $item['Deskripsi']; ?></strong></p>
                <p class="product-price">Rp <?= number_format($item['gaji_bersih'], 0, ',', '.'); ?></p>
                <a href="<?= base_url('transaksi/details/' . $item['id']); ?>" class="buy-button">
                        Beli Sekarang
                    </a>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>