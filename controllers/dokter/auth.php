<?php
    function login () {
        include '../../../config/connection.php';
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];

            $stmt = $connect->prepare("SELECT * FROM dokter WHERE nama = ?");
            $stmt->bind_param("s", $nama);
            $stmt->execute();
            $results = $stmt->get_result();
            $user = $results->fetch_assoc();

            if ($user) {
                if ($alamat == $user['alamat']) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['name'] = $user['nama'];
                    $_SESSION['role'] = 'dokter';
                    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/dokter/');
                } else {
                    $_SESSION['error'] = 'Username atau Password anda salah!';
                    echo "<meta http-equiv='refresh' content='0;'>";
                    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/auth/login-dokter.php');
                }
            } else {
                $_SESSION['error'] = 'Username atau Password anda salah!';
                echo "<meta http-equiv='refresh' content='0;'>";
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/auth/login-dokter.php');
            }
        }
    }
?>