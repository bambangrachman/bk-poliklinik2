<?php 
    function login () {
        include '../../../config/connection.php';

        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            
            $stmt = $connect->prepare("SELECT * FROM pasien WHERE nama = ?");
            $stmt->bind_param("s", $nama);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($result->num_rows > 0) {
                if ($row['no_ktp'] == $_POST['no_ktp']) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['role'] = 'pasien';
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['nama'];
                    $_SESSION['no_ktp'] = $row['no_ktp'];
                    $_SESSION['no_rm'] = $row['no_rm'];
                    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/pasien/');
                } else {
                    $_SESSION['error'] = 'No KTP yang anda masukkan salah!';
                    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/auth/login-pasien.php');
                }
            } else {
                $_SESSION['error'] = 'Nama yang anda masukkan tidak terdaftar!';
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/auth/login-pasien.php');
            }
        }
    }

    function register () {
        include '../../../config/connection.php';
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_ktp = $_POST['no_ktp'];
            $no_hp = $_POST['no_hp'];
            $no_rm = rand(100000, 999999);

            $stmt = $connect->prepare("INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nama, $alamat, $no_ktp, $no_hp, $no_rm);
            $stmt->execute();

            $_SESSION['success'] = 'Register berhasil, silahkan login menggunakan nama & nomor KTP anda!';
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/auth/register-pasien.php');
        }
    }
?>