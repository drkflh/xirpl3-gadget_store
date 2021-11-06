<?php
$ambil = $koneksi->query("SELECT * FROM pelanggan where id_pelanggan='$_GET[id]'");
$bagi = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
echo "<script>alert('pelanggan telah dihapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";