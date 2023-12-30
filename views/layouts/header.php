<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <?php 
                if ($_SESSION['role'] === 'admin') {
                    echo '
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/controllers/admin/logout.php" class="dropdown-item">Logout</a>
                    </div>
                    ';
                } else if ($_SESSION['role'] === 'dokter') {
                    echo '
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/controllers/dokter/logout.php" class="dropdown-item">Logout</a>
                    </div>
                    ';
                } else if ($_SESSION['role'] === 'pasien') {
                    echo '
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="http://'.$_SERVER['HTTP_HOST'].'/bk-poliklinik/controllers/pasien/logout.php" class="dropdown-item">Logout</a>
                    </div>
                    ';
                }
            ?>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="http://<?= $_SERVER['HTTP_HOST']?>/bk-poliklinik/" class="brand-link">
        <img src="http://<?= $_SERVER['HTTP_HOST']?>/bk-poliklinik/public/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Poliklinik BK</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="http://<?= $_SERVER['HTTP_HOST']?>/bk-poliklinik/public/img/placeholder.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['name'] ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php 
                    if ($_SESSION['role'] === 'admin') {
                        echo '
                        <li class="nav-item">
                            <a href="'.$BASE_ADMIN_PAGES.'?page=dashboard" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                    <span class="right badge badge-success">Admin</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="'.$BASE_ADMIN_PAGES.'?page=obat" class="nav-link">
                                <i class="nav-icon fas fa-pills"></i>
                                <p>
                                    Obat
                                    <span class="right badge badge-success">Admin</span>
                                </p>
                            </a>
                        </li>';
                    } else if ($_SESSION['role'] === 'dokter') {
                        echo '
                        <li class="nav-item">
                            <a href="'.$BASE_DOKTER_PAGES.'" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                    <span class="right badge badge-danger">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="'.$BASE_DOKTER_PAGES.'?page=jadwal_periksa" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Jadwal Periksa
                                    <span class="right badge badge-danger">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="'.$BASE_DOKTER_PAGES.'?page=riwayat_pasien" class="nav-link">
                                <i class="nav-icon fas fa-notes-medical"></i>
                                <p>
                                    Riwayat Pasien
                                    <span class="right badge badge-danger">Dokter</span>
                                </p>
                            </a>
                        </li>';
                    } else if ($_SESSION['role'] === 'pasien') {
                        echo '
                        <li class="nav-item">
                            <a href="'.$BASE_PASIEN_PAGES.'?page=dashboard" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                    <span class="right badge badge-warning">Pasien</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="'.$BASE_PASIEN_PAGES.'?page=daftar_poli" class="nav-link">
                                <i class="nav-icon fas fa-hospital"></i>
                                <p>
                                    Daftar Poli
                                    <span class="right badge badge-warning">Pasien</span>
                                </p>
                            </a>
                        </li>';
                    }
                ?>
            </ul>
        </nav>
    </div>
</aside>