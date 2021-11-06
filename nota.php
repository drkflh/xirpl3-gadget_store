<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Login Dulu Bos!!!')</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-32x32.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Gadget Store - Detail Pembayaran</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script>
    $(window).on('scroll', function() {
        if ($(window).scrollTop()) {
            $('nav').addClass('fixed-top');
        } else {
            $('nav').removeClass('fixed-top');
        }
    });
    </script>
    <style>
    body {
        background-color: #2273f8;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo1.png" alt="Logo" class="logo">
                    <img src="images/logo2.png" alt="Logo" class="logo-scroll">
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="toko.php">Toko</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="keranjang.php">Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="checkout.php">Checkout</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form class="d-flex">
                                <?php if (isset($_SESSION["pelanggan"])) : ?>
                                <a href="logout.php" class="btn btn-primary" href="logout.php" type="submit"><i
                                        class="fas fa-user"> Logout</i></a>
                                <?php else : ?>
                                <a href="login.php" class="btn btn-primary" href="login.php" type="submit"><i
                                        class="fas fa-user"> Login</i></a>
                                <?php endif; ?>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>


        <!--Navbar Selesai-->
        <section class="konten">
            <div class="container">
                <h2>Detail Pembelian</h2>
                <hr>
                <?php
                $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");
                $detail = $ambil->fetch_assoc();
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <h3>Pembelian</h3>
                        <strong>No Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
                        <p>
                            Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
                            Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
                        </p>
                    </div>

                    <div class="col-md-4">
                        <h3>Pelanggan</h3>
                        <strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong><br>
                        <p>
                            No : <?php echo $detail['telepon_pelanggan']; ?><br>
                            Email : <?php echo $detail['email_pelanggan']; ?>
                        </p>
                    </div>

                    <div class="col-md-4">
                        <h3>Pengiriman</h3>
                        <strong>Ke : <?php echo $detail['nama_kota']; ?></strong><br>
                        <p>
                            Alamat : <?php echo $detail['alamat']; ?> <br>
                            Biaya Rp.<?php echo number_format($detail['tarif']); ?>
                        </p>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON
        pembelian_produk.id_produk = produk.id_produk 
        WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
                        <?php while ($bagi = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor ?></td>
                            <td><?php echo $bagi['nama_produk']; ?></td>
                            <td>Rp. <?php echo number_format($bagi['harga_produk']); ?></td>
                            <td><?php echo $bagi['jumlah']; ?></td>
                            <td>
                                Rp. <?php echo number_format($bagi['harga_produk'] * $bagi['jumlah']); ?>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
        <div class="container">
            <div class="col-md-5">
                <div class="alert alert-success">
                    <p>
                        Silakan Lakukan Pembayaran Sebesar Rp. <?php echo number_format($detail['total_pembelian']); ?>
                        <strong>BANK BRI 189-282-2729 AN GADGET STORE</strong>

                    </p>
                </div>
            </div>
        </div>
    </header>


    <section id="footer">
        <footer class="pt-5 pb-4">
            <div class="container text-md-left">
                <div class="footer-top row text-md-left">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4 footer_title">Gadget Store</h5>
                        <p class="footer_description">Gadget Store #1 Di Indonesia</p>
                    </div>
                    <div class="footer-contact col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4">Contact</h5>
                        <p>
                            <i class='fas fa-home me-3'> </i> Purwokerto
                        </p>
                        <p>
                            <i class='fas fa-envelope me-3'> </i> admin@gadgetstore.com
                        </p>
                        <p>
                            <i class='fas fa-phone me-3'> </i> 082136951197
                        </p>
                    </div>
                </div>

                <hr class="mb-4">

                <div class="footer-bottom row align-items-center">
                    <div class="col-md-7 col-lg-8">
                        <p class="footer_description">&copy; <script>
                            document.write(new Date().getFullYear())
                            </script> Kelompok 4, XI RPL 3 </p>
                    </div>

                    <div class="col-md-5 col-lg-4">
                        <ul>
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/bongel.speed.3" target="_blank"
                                    class="footer_social"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.instagram.com/drkflh/" target="_blank" class="footer_social"><i
                                        class="fab fa-instagram"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://twitter.com/Darikaflah" target="_blank" class="footer_social"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://github.com/drkflh/xirpl3-gadget_store" target="_blank"
                                    class="footer_social"><i class="fab fa-github"></i></a>
                            </li>
                            <a href="admin/login.php" class="footer_link">Admin</a>

                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>