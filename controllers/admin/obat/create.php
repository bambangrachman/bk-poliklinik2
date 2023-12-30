<?php
    include '../../../config/connection.php';

    $nama_obat = $_POST['obat'];
    $kemasan = $_POST['kemasan'];
    $harga = $_POST['harga'];

    $stmt = $connect->prepare("INSERT INTO obat (nama_obat, kemasan, harga) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nama_obat, $kemasan, $harga);
    $stmt->execute();
    $stmt->close();

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/admin?page=obat');
?>