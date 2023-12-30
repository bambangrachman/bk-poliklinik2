<?php 
    session_start();
    include '../../../config/connection.php';

    if (isset($_POST['submit'])) {
        $query = "SELECT * FROM daftar_poli";
        $results = mysqli_query($connect, $query);
    
        $pasien = $_SESSION['id'];
        $jadwal = $_POST['jadwal'];
        $poli = $_POST['poli'];
        $keluhan = $_POST['keluhan'];
        $antrian = mysqli_num_rows($results) + 1;
    
        $stmt = $connect->prepare("INSERT INTO daftar_poli (id_pasien, id_jadwal, keluhan, no_antrian) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iisi", $pasien, $jadwal, $keluhan, $antrian);
        $stmt->execute();
        $stmt->close();
    
        $_SESSION['success'] = 'Pendaftaran poli berhasil, silahkan menunggu antrian anda!';
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/pasien?page=daftar_poli');
    }
?>