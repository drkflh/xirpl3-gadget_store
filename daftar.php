<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gadget Store - Daftar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-16x16.png">
    <link rel="shortcut icon" href="icon/favicon.ico">

    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-32x32.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="admin/assets/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/assets/css/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="admin/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><i class="fas fa-caret-square-left"></i>
            Kembali</a>
    </nav>
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Selamat Datang</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Masuk Ke Akun Anda</h5>
                                        <p class="text-center small">Masukan Username & Password!</p>
                                    </div>

                                    <form class="row g-3" action="" role="form" method="post">

                                        <div>
                                            <label for="user">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" />
                                        </div>

                                        <div>
                                            <label for="pass">Password</label>
                                            <input type="password" name="pass" class="form-control" id="pass" />
                                        </div>

                                        <div>
                                            <label for="pass">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama" />
                                        </div>

                                        <div>
                                            <label for="pass">No Telepon</label>
                                            <input type="number" name="no" class="form-control" id="no" />
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Ingatsaya</label>
                                            </div>
                                        </div>
                                </div>

                                <button class="btn btn-primary w-100" name="daftar">Daftar</button>
                                <p class="small mb-0">Sudah Memiliki Akun? <a href="login.php">Masuk
                                        Akun</a></p>
                                </form>
                                <?php
                                if (isset($_POST['daftar'])) {
                                    $ambil = $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan)
                                    VALUES ('$_POST[email]','$_POST[pass]','$_POST[nama]','$_POST[no]')");
                                    echo "<script>alert('Akun Anda Telah Dibuat')</script>";
                                    echo "<script>location='login.php'</script>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        </div>
    </main>
    <?php
    if (isset($_POST['login'])) {
        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan ='$_POST[email]'
                                            AND password_pelanggan = '$_POST[pass]'");
        $yangcocok = $ambil->num_rows;
        if ($yangcocok == 1) {
            $_SESSION['pelanggan'] = $ambil->fetch_assoc();
            echo "<script>alert('login berhasil')</script>";
            echo "<script>location = 'checkout.php'</script>";
        } else {
            echo "<script>alert('login gagal')</script>";
            echo "<script>location = 'login.php'</script>";
        }
    }
    ?>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>