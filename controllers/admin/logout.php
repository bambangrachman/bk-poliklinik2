<?php 
    include '../../../config/connection.php';
    session_start();
    session_destroy();
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/index.php');
?>