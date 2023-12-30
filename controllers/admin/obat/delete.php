<?php 
    include '../../../config/connection.php';

    $id = $_GET['id'];

    $query = "DELETE FROM obat WHERE id = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/admin?page=obat');
?>