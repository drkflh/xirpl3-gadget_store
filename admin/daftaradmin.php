<?php
$koneksi = new mysqli("localhost", "root", "", "tokoku");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DAFTAR - ADMIN GADGET STORE</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="assets/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="login.php"><i class="fas fa-caret-square-left"></i>
                    Kembali</a>
            </nav>
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Selamat Datang Admin </span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Daftar Akun Anda</h5>
                                        <p class="text-center small">Masukan Data Dengan Benar!!!</p>
                                    </div>

                                    <form class="row g-3" action="" role="form" method="post">

                                        <div>
                                            <label for="user">Username</label>
                                            <input type="text" name="user" id="user" class="form-control" />
                                        </div>

                                        <div>
                                            <label for="pass">Password</label>
                                            <input type="password" name="pass" class="form-control" id="pass" />
                                        </div>
                                        <div>
                                            <label for="pass">Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control" id="nama" />
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
                                <p class="small mb-0">Anda Memiliki Akun? <a href="login.php">Masuk
                                        Akun</a></p>
                                </form>
                                <?php
                                if (isset($_POST['daftar'])) {
                                    $ambil = $koneksi->query("INSERT INTO admin (username,password,nama_lengkap)
                                    VALUES ('$_POST[user]','$_POST[pass]','$_POST[nama]')");
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
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>