<?php
    function login () {
        include '../../../config/connection.php';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $stmt = $connect->prepare("SELECT * FROM admin WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $results = $stmt->get_result();
            $user = $results->fetch_assoc();

            if ($user) {
                if ($password == $user['password']) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['name'] = $user['nama'];
                    $_SESSION['role'] = 'admin';
                    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/admin/');
                } else {
                    $_SESSION['error'] = 'Username atau Password anda salah!';
                    echo "<meta http-equiv='refresh' content='0;'>";
                    header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/auth/login-admin.php');
                }
            } else {
                $_SESSION['error'] = 'Username atau Password anda salah!';
                echo "<meta http-equiv='refresh' content='0;'>";
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/views/pages/auth/login-admin.php');
            }
        }
    }
?>