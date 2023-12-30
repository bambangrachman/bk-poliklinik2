<?php 
    session_start();
    include_once '../../../config/base_url.php';

    if ($_SESSION['role'] !== 'admin') {
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik | Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/public/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="http://<?= $_SERVER['HTTP_HOST'] ?>/bk-poliklinik/public/img/Logo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->
        <?php include "../../layouts/header.php" ?>

        <!-- Cek Path URL dan Menampilkan View yang sesuai -->
        <?php
            if (isset($_GET['page'])) {
                if ($_GET['page'] === 'dashboard') {
                    include_once ('./dashboard/index.php');
                } else if ($_GET['page'] === 'obat') {
                    include_once ('./obat/index.php');
                }
            } else {
                include_once ('./dashboard/index.php');
            }
        ?>

        <?php include "../../layouts/footer.php"; ?>
    </div>
    <?php include "../../layouts/pluginsexport.php"; ?>
</body>