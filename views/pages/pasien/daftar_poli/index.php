<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mt-4 mb-2">Halaman Daftar Poli</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Poliklinik BK</a></li>
                    <li class="breadcrumb-item active">Daftar Poli</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <?php
                        if (isset($_SESSION['success'])) {
                            echo "<p class='text-success mt-1 mb-3'>" . $_SESSION['success'] . "</p>";
                            unset($_SESSION['success']);
                        }
                    ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <p class="my-2">Daftar Poli</p>
                        </div>
                        <div class="card-body">
                            <form action="<?= $BASE_PASIEN_CONTROLLERS . '/daftar_poli/create.php' ?>" method="POST">
                                <div class="form-group">
                                    <label class="form-label">Nomor Rekam Medis</label>
                                    <input type="text" class="form-control" name="no_rm" value="<?= $_SESSION['no_rm'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Poli</label>
                                    <select name="poli" class="form-control">
                                        <option value="">-Pilih Poli-</option>
                                        <?php 
                                            include "../../../config/connection.php";

                                            $query = "SELECT * FROM poli";
                                            $results = mysqli_query($connect, $query);

                                            while ($poli = mysqli_fetch_assoc($results)) {
                                                echo "<option value='" . $poli['id'] . "'>" . $poli['nama_poli'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jadwal</label>
                                    <select name="jadwal" class="form-control">
                                        <option value="">-Pilih Jadwal-</option>
                                        <?php 
                                            include "../../../config/connection.php";

                                            $query = "SELECT * FROM jadwal_periksa";
                                            $results = mysqli_query($connect, $query);

                                            while ($jadwal = mysqli_fetch_assoc($results)) {
                                                echo "<option value='" . $jadwal['id'] . "'>" . $jadwal['hari'] . " (" . $jadwal['jam_mulai'] . " - " . $jadwal['jam_selesai'] . ")</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Keluhan</label>
                                    <textarea name="keluhan" cols="10" rows="5" class="form-control" placeholder="Masukkan keluhan anda"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="submit">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>