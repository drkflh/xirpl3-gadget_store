<?php
$ambil = $koneksi->query("SELECT * FROM produk where id_produk='$_GET[id]'");
$bagi = $ambil->fetch_assoc();
$fotoproduk = $bagi['foto_produk'];
if (file_exists("../admin/assets/img/$fotoproduk")) {
    unlink("../admin/assets/img/$fotoproduk");
}
$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
echo "<script>alert('produk telah dihapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";