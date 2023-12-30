<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/public/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/index.php" class="h1"><b>Poli</b>klinik</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in</p>
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username | Case Sensitive" name="username" value="Admin">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password | Case Sensitive" name="password" value="admin123">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?php
                    if (isset($_SESSION['error'])) {
                        echo "<p class='text-danger mt-1 mb-3'>" . $_SESSION['error'] . "</p>";
                        unset($_SESSION['error']);
                    }
                ?>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
                    </div>
                </div>
            </form>
            <?php 
                include '../../../controllers/admin/auth.php';
                login();
            ?>
        </div>
    </div>
    </div>

    <!-- jQuery -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/jquery/jquery.min.js">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinikplugins/bootstrap/js/bootstrap.bundle.min.jss">
    <!-- AdminLTE App -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/public/js/adminlte.min.js">
</body>
</html>
