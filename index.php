<?php
session_start();
$_SESSION = true;
require 'pagination.php';

$product = query("SELECT product.id, productImage, productName, productPrice, shop.shopAddress, productStar, productSold FROM product JOIN shop ON product.shopID = shop.id LIMIT $awalData, $jumlahDataPerHalaman");

if (isset($_POST['submit'])) {
    $product = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AltairStore | Menyediakan Berbagai Kebutuhan</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/707c864a21.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <section class="header">
        <div class="logo">
            <a href="#"><img src="assets/logo.webp" alt=""></a>
        </div>
        <div class="navlink">
            <a href="#" id="searchButton"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="login.php"><i class="fa-solid fa-user"></i></a>
        </div>
        <div class="bars">
            <i class="fa-solid fa-bars"></i>
        </div>
        <form action="" method="post" class="form">
            <input type="search" name="keyword" id="searchbox" placeholder="Mau cari apa?" autocomplete="off">
            <button type="submit" name="submit">Cari</button>
        </form>
    </section>
    <section class="home">
        <img src="assets/indonesia (1).jpg" alt="">
        <div class="home-text">
            <div class="content">
                <h4>Trade - in - offer</h4>
                <h3>Super value deals</h3>
                <h3 style="color: #009999;">On all products</h3>
                <p>Save more with coupons & up to 70% off!</p>
            </div>
            <div class="button">
                <a href="#products"><i class="fa-solid fa-cart-shopping"></i> Shop now</a>
            </div>
        </div>
    </section>
    <section class="hero">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/indonesia (1).jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/indonesia (2).jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/indonesia (3).jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </section>
    <section class="product" id="products">
        <div class="title">
            <h4>Kategori Pilihan</h4>
        </div>
        <div class="buttons">
            <a href="smartphonePage.php">Smartphone</a>
            <a href="#">Laptop</a>
            <a href="#">Gaming</a>
            <a href="#">Elektronik Dapur</a>
            <a href="#">Elektronik Kantor</a>
            <a href="#">TV & Aksesoris</a>
        </div>
        <div class="baris">
            <?php foreach ($product as $row) : ?>
                <a href="productPage.php?id=<?= $row["id"] ?>">
                    <div class="kartu">
                        <img src="assets/MPPL/<?= $row["productImage"] ?>" alt="">
                        <div class="caption">
                            <div class="product-title">
                                <p><?= $row["productName"] ?></p>
                            </div>
                            <div class="price">
                                <h4>IDR <?= number_format($row["productPrice"], 0, ',', '.'); ?></h4>
                            </div>
                            <div class="address">
                                <img src="assets/badge_os.png" alt="">
                                <p><?= $row["shopAddress"] ?></p>
                            </div>
                            <div class="rating">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="sold">
                                    <p> <?= $row["productStar"] ?> | <?= $row["productSold"] ?> terjual</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </section>
    <section class="pagination">
        <nav aria-label="...">
            <ul class="pagination">

                <li class="page-item">
                    <?php if ($halamanAktif > 1) : ?>
                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
                    <?php else : ?>
                        <a class="page-link" href="?halaman=<?= $halamanAktif ?>" tabindex="-1" aria-disabled="true">Previous</a>
                    <?php endif; ?>
                </li>

                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                    <li class="page-item<?= ($i == 1) ? ' ' : '' ?>"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i ?></a></li>
                <?php endfor; ?>

                <li class="page-item">
                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">Next</a>
                    <?php else : ?>
                        <a class="page-link" href="?halaman=<?= $jumlahHalaman ?>">Next</a>
                    <?php endif; ?>
                </li>

            </ul>
        </nav>
    </section>
    <section class="footer">
        <div class="box">
            <h4>Customer Care</h4>
            <a href="#">Contact Us</a>
            <a href="#">FAQs</a>
            <a href="#">Return & Exchanges</a>
            <a href="#">Shipping</a>
            <a href="#">Cancelling Order</a>
            <a href="#">Terms of Service</a>
            <a href="#">Privacy Policy</a>
        </div>
        <div class="box">
            <h4>Inside AltairStore</h4>
            <a href="#">About Us</a>
            <a href="#">Carrier</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="box">
            <h4>My Account</h4>
            <a href="#">Sign in/Register</a>
            <a href="#">My Whishlist</a>
            <a href="#">My Card</a>
        </div>
        <div class="box">
            <h4>Top Searches</h4>
            <a href="#">Shoes</a>
            <a href="#">Bag</a>
            <a href="#">Fashion</a>
        </div>
        <div class="box">
            <h4>Sign up & get 10% off</h4>
            <div class="input-field">
                <input type="text" name="" id="" placeholder="Email address">
                <button>Subscribe</button>
            </div>
            <div class="social">
                <i class="fa-brands fa-square-facebook"></i>
                <i class="fa-brands fa-square-instagram"></i>
                <i class="fa-brands fa-square-twitter"></i>
                <i class="fa-brands fa-square-youtube"></i>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>