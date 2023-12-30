<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Jadwal Periksa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Poliklinik BK</a></li>
                    <li class="breadcrumb-item active">Jadwal Periksa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="my-2 card-title">Tabel Data Jadwal Periksa</p>
                        <button data-toggle="modal" data-target="#tambahJadwalPeriksaModal" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            Tambah Jadwal Periksa
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Jam Mulai</th>
                                    <th scope="col">Jam Selesai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include "../../../config/connection.php";

                                    $no = 1;
                                    $query = "SELECT 
                                    d.nama as nama_dokter, 
                                    p.id as id,
                                    p.hari as hari,
                                    p.jam_mulai as jam_mulai,
                                    p.jam_selesai as jam_selesai
                                    FROM jadwal_periksa p INNER JOIN dokter d ON p.id_dokter = d.id";
                                    $results = mysqli_query($connect, $query);

                                    if ($results->num_rows === 0) {
                                        echo "<tr><td colspan='7' align='center'>Tidak ada data</td></tr>";
                                    } else {
                                        while ($jadwal = mysqli_fetch_assoc($results)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $jadwal['nama_dokter'] ?></td>
                                        <td><?= $jadwal['hari'] ?></td>
                                        <td><?= $jadwal['jam_mulai'] ?></td>
                                        <td><?= $jadwal['jam_selesai'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete-button"><i class="fa fa-trash"></i> Hapus</a>    
                                        </td>
                                    </tr>
                                    <?php
                                        }
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
<div class="modal fade" id="tambahJadwalPeriksaModal" tabindex="-1" role="dialog" aria-labelledby="tambahJadwalPeriksaModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahJadwalPeriksaModal">Form Tambah Data Jadwal Periksa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-12 col-md-6 form-group">
                            <label class="form-label">Dokter</label>
                            <select name="dokter" class="form-control">
                                <option value="">-Pilih Dokter-</option>
                                <?php 
                                    include "../../../config/connection.php";

                                    $query = "SELECT * FROM dokter";
                                    $results = mysqli_query($connect, $query);

                                    if ($results->num_rows === 0) {
                                        echo "<option value=''>Tidak ada data</option>";
                                    } else {
                                        while ($dokter = mysqli_fetch_assoc($results)) {
                                    ?>
                                    <option value="<?= $dokter['id'] ?>"><?= $dokter['nama'] ?></option>
                                    <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="form-label">Hari</label>
                            <select name="hari" class="form-control">
                                <option value="">-Pilih Hari-</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" class="form-control" name="jam_mulai">
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" class="form-control" name="jam_selesai">
                        </div>
                        <div class="col-12 form-group">
                            <button class="btn btn-success btn-sm" type="submit">
                                <i class="fas fa-save"></i>
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>