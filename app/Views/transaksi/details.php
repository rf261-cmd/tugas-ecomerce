<?= $this->extend('dashboard'); ?>
<?= $this->section('isi'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Add your HTML content here, for example: -->
  
<!-- Product Grid -->
<div class="product-detail-container">

    <div class="product-image">
       
  
    <div class="product-info">
        <h1><?= $gaji['Deskripsi']; ?></h1>
        <p class="product-price">Rp <?= number_format($gaji['gaji_bersih'], 0, ',', '.'); ?></p>
        <input type="number" id="quantity" min="1" value="1">
        <button class="buy-button">Masukkan Ke Keranjang</button>
    </div>
    </div>

</div>


<style>
/* Add your CSS here */
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
    border-radius: 8px;
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

.product-info .stock, 
.product-info .description, 
.product-info .available-colors, 
.product-info .size-chart, 
.product-info .material, 
.product-info .note {
    font-size: 14px;
    margin: 5px 0;
}

#quantity {
    width: 50px;
    padding: 5px;
    margin: 10px 0;
}

.btn {
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
</style>

<?= $this->endSection(); ?>

