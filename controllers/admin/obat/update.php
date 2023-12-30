<?php 
    include '../../../config/connection.php';

    $id = $_POST['id'];
    $nama_obat = $_POST['obat'];
    $kemasan = $_POST['kemasan'];
    $harga = $_POST['harga'];

    $stmt = $connect->prepare("UPDATE obat SET nama_obat = ?, kemasan = ?, harga = ? WHERE id = ?");
    $stmt->bind_param("ssii", $nama_obat, $kemasan, $harga, $id);
    $stmt->execute();
    $stmt->close();

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/admin?page=obat');
?>