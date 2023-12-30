<?php 
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        if ($_SESSION['role'] === 'admin') {
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/admin/');
        } else if ($_SESSION['role'] === 'dokter') {
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/dokter/');
        } else if ($_SESSION['role'] === 'pasien') {
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/pasien/');
        }
    } else {
        include_once 'views/pages/welcome.php';
    };
?>