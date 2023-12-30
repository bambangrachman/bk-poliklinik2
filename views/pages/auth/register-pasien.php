<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik | Registration Page (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/public/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/index.php" class="h1"><b>Poli</b>klinik</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new account</p>
                <?php
                    if (isset($_SESSION['success'])) {
                        echo "<p class='text-success mt-1 mb-3'>" . $_SESSION['success'] . "</p>";
                        unset($_SESSION['success']);
                    }
                ?>
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required placeholder="Fullname" name="nama" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required placeholder="Alamat" name="alamat" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-map-marker"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" required placeholder="No KTP" name="no_ktp" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-address-book"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" required placeholder="No Hp" name="no_hp" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone-square"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Register</button>
                        </div>
                    </div>
                </form>
                <?php 
                    include '../../../controllers/pasien/auth.php';
                    register();
                ?>
                <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/views/pages/auth/login-pasien.php" class="text-center">I already have an account</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/public/js/adminlte.min.js"></script>
</body>
</html>