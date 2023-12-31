<?php
require 'function.php';
$cart = mysqli_query($conn, "SELECT * FROM cart");
$jumlahData = count(query("SELECT * FROM cart"));
$totalHarga = 0;
foreach ($cart as $item) {
    $totalHarga += $item['productPrice'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="stylesheet" href="css/cart.css">
    <script src="https://kit.fontawesome.com/707c864a21.js" crossorigin="anonymous"></script>
    <script src="js/global.js" defer></script>
</head>

<body>
    <section class="header">
        <div class="logo">
            <a href="index.php">OurShop</a>
        </div>
        <div class="navlink">
            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="login.php"><i class="fa-solid fa-user"></i></a>
        </div>
    </section>
    <section class="row">
        <div class="col">
            <div class="sub-row">
                <?php foreach ($cart as $product) : ?>
                    <div class="card">
                        <div class="shopName">
                            <div class="shop-title">
                                <img src="assets/badge_os.png" alt="">
                                <h4><?= $product["shopName"] ?></h4>
                            </div>
                            <p class="shop-location"><?= $product["shopAddress"] ?></p>
                        </div>
                        <div class="product-information">
                            <img src="assets/MPPL/<?= $product["productImage"] ?>" alt="" style="width: 60px; height: 60px; object-fit:cover; border-radius:5px;">
                            <div class="product-information-row">
                                <p class="product-title"><?= $product["productName"] ?></p>
                                <p class="price">IDR <?= number_format($product["productPrice"], 0, ',', '.'); ?></p>

                            </div>
                        </div>
                        <div class="setting">
                            <div class="sub-col">
                                <p class="catatan">Tulis Catatan</p>
                            </div>
                            <div class="sub-col">
                                <div class="sub-row2">
                                    <p class="whishlist">Sudah di Wishlist |</p>
                                    <a href="hapus.php?id=<?= $product["id"] ?>"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                                <div class="sub-row2">
                                    <div class="icon">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <div class="quantity">
                                        <p>1</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col">
            <div class="box">
                <div class="promo">
                    <p>Makin hemat dengan promo</p>
                </div>
                <div class="sumbuy">
                    <p class="sumbuy-title">Ringkasan Belanja</p>
                    <div class="sub-sumbuy">
                        <p>Total Harga (<?= $jumlahData ?> barang)</p>
                        <p>IDR <?= number_format($totalHarga, 0, ',', '.') ?></p>
                    </div>
                </div>
                <div class="total">
                    <p>Total Harga</p>
                    <p class="price">IDR <?= number_format($totalHarga, 0, ',', '.') ?></p>
                </div>
                <form action="shipment.php">
                    <button type="submit">Beli</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>