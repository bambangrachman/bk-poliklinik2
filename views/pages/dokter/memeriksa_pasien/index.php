<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Daftar Periksa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Poliklinik BK</a></li>
                    <li class="breadcrumb-item active">Daftar Periksa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary">
                <div class="card-header">
                    <p class="my-2 card-title">Tabel Data Daftar Periksa</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table-bordered table">
                        <thead>
                            <tr>
                                <th scope="col">No Urut</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Keluhan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../../../config/connection.php";

                            $query = "SELECT
                                        periksa.id AS id_periksa,
                                        pasien.id AS id_pasien,
                                        periksa.catatan AS catatan,
                                        daftar_poli.no_antrian AS no_antrian,
                                        pasien.nama AS nama_pasien,
                                        daftar_poli.keluhan AS keluhan
                                        FROM pasien 
                                        INNER JOIN daftar_poli ON pasien.id = daftar_poli.id_pasien
                                        LEFT JOIN periksa ON daftar_poli.id = periksa.id_daftar_poli";
                            $results = mysqli_query($connect, $query);

                            while ($periksa = mysqli_fetch_assoc($results)) {
                            ?>
                                <tr>
                                    <td><?= $periksa['no_antrian'] ?></td>
                                    <td><?= $periksa['nama_pasien'] ?></td>
                                    <td><?= $periksa['keluhan'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>