<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "tokoku");
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Login Dulu Bos!!!')</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ADMIN - TOKOKU</title>
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="assets/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">Admin Gadget Store </span>
        </a>
    </header>

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" a href="index.php?halaman=produk">
                    <i class="bi bi-box-seam"></i><span>Produk</span></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?halaman=pembelian">
                    <i class="bi bi-journal-text"></i><span>Pembelian</span></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?halaman=pelanggan">
                    <i class="bi bi-person-fill"></i><span>Pelanggan</span></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?halaman=logout">
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

    </aside>

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">

                <!-- Website Traffic -->
                <div class="card">
                    <div id="page-wrapper">
                        <div id="page-inner">
                            <?php
                            if (isset($_GET['halaman'])) {
                                if ($_GET['halaman'] == "produk") {
                                    include 'produk.php';
                                } else if ($_GET['halaman'] == "pembelian") {
                                    include 'pembelian.php';
                                } else if ($_GET['halaman'] == "pelanggan") {
                                    include 'pelanggan.php';
                                } else if ($_GET['halaman'] == "detail") {
                                    include 'detail.php';
                                } else if ($_GET['halaman'] == "tambahproduk") {
                                    include 'tambahproduk.php';
                                } else if ($_GET['halaman'] == "hapusproduk") {
                                    include 'hapusproduk.php';
                                } else if ($_GET['halaman'] == "ubahproduk") {
                                    include 'ubahproduk.php';
                                } else if ($_GET['halaman'] == "login") {
                                    include 'login.php';
                                } else if ($_GET['halaman'] == "logout") {
                                    include 'logout.php';
                                } else if ($_GET['halaman'] == "hapuspelanggan") {
                                    include 'hapuspelanggan.php';
                                } else if ($_GET['halaman'] == "ubahpelanggan") {
                                    include 'ubahpelanggan.php';
                                } else if ($_GET['halaman'] == "daftaradmin") {
                                    include 'daftaradmin.php';
                                }
                            } else {
                                include 'produk.php';
                            }
                            ?>
                        </div>
                    </div>
                </div><!-- End Website Traffic -->

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            XI RPL 3_Kelompok 4
        </div>
    </footer><!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>