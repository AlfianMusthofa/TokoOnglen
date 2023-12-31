<?php

$conn = mysqli_connect("localhost", "root", "", "shop_db");

function query($query)
{

    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $conn;
    $username = $data["username"];
    $password = $data["password"];
    $password2 = $data["password2"];

    $ceknama = mysqli_query($conn, "SELECT username FROM user_db WHERE username = '$username'");

    if (mysqli_num_rows($ceknama)) {
        echo "
        <script>
        alert('username sudah terdaftar');
        </script>
        ";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
        alert('password tidak sama');
        </script>";
        return false;
    }

    $query = "INSERT INTO user_db VALUE ('', '$username', '$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahKeranjang($product)
{
    global $conn;

    $shopName = $product["shopName"];
    $shopAddress = $product["shopAddress"];
    $productImage = $product["gambar"];
    $productName = $product["productName"];
    $productPrice = $product["productPrice"];

    $query = "INSERT INTO cart VALUE ('','$shopName', '$shopAddress', '$productImage', '$productName', '$productPrice')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT product.id, productImage, productName, productPrice, shop.shopAddress, productStar, productSold FROM product JOIN shop ON product.shopID = shop.id WHERE productName LIKE '%$keyword%'";
    return query($query);
}
