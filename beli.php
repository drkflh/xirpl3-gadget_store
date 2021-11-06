<?php
session_start();
//mednapatkan id
$id_produk = $_GET['id'];
//jumlah ditambah 1
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
}
//belum ada dikeranjang
else {
    $_SESSION['keranjang'][$id_produk] = 1;
}
//kehalaman keranjang
echo "<script>alert('produk telah masuk ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";