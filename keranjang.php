<?php
session_start();
include 'koneksi.php';
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('tidak ada produk dikeranjang');</script>";
    echo "<script>location='toko.php';</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-16x16.png">
    <link rel="shortcut icon" href="icon/favicon.ico">

    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-32x32.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <title>Gadget Store - Keranjang</title>
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


        <section class="konten">
            <div class="container">
                <h1>Keranjang</h1>
                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <?php
                            $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah['harga_produk'] * $jumlah;
                            ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["nama_produk"]; ?></td>
                            <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                            <td>
                                <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>"
                                    class="btn btn-danger btn-xs">Hapus</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="toko.php" class="btn btn-info">Lanjutkan Belanja</a>
                <a href="checkout.php" class="btn btn-success">Checkout</a>
                </hr>
            </div>
        </section>
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