<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php
//Mendapat Id
$id_produk = $_GET["id"];
//ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
?>
<!doctype html>
<html lang=" en">

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
    <title>Gadget Store - Detail</title>
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
                <div class="row">
                    <div class="col-md-5">
                        <img width="400px" height="" src="admin/assets/img/<?php echo $detail["foto_produk"]; ?>"
                            class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo $detail["nama_produk"]; ?></h2>
                        <h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
                        <h5>Stok Tersedia : <?php echo $detail["stok_produk"]; ?></h5>
                        <p>Detail :<br> <?php echo $detail["deskripsi_produk"]; ?></p>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-6">
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="number" placeholder="Masukan Jumlah" class="form-control"
                                        max="<?php echo $detail['stok_produk'] ?>" name="jumlah">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" name="beli">Beli</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php
                    if (isset($_POST["beli"])) {
                        $jumlah = $_POST["jumlah"];
                        $_SESSION["keranjang"][$id_produk] = $jumlah;
                        echo "<script>alert('Produk Masuk Ke Keranjang');</script>";
                        echo "<script>location='keranjang.php';</script>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </header>
    <section id="product">
        <div class="container">
            <h1>Produk Terbaru
            </h1>
            <div class="row">
                <?php
                $ambil = mysqli_query($koneksi, "SELECT * FROM produk LIMIT 4");
                while ($perproduk = mysqli_fetch_array($ambil)) {
                ?>
                <div class="col-md-3 ">
                    <div class="pricing-card">
                        <h5><?php echo $perproduk['nama_produk']; ?></h5>
                        <img width="250px" height="180px"
                            src="admin/assets/img/<?php echo $perproduk['foto_produk']; ?>" alt="" class="img-fluid">
                        <h4>Rp.
                            <?php echo number_format($perproduk['harga_produk']); ?></h4>
                        <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Detail </a>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

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