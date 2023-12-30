<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Riwayat Pasien</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Poliklinik BK</a></li>
                    <li class="breadcrumb-item active">Riwayat Pasien</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary">
                <div class="card-header">
                    <p class="my-2 card-title">Tabel Data Riwayat Pasien</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No. KTP</th>
                                    <th scope="col">No. Telepon</th>
                                    <th scope="col">No. RM</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include "../../../config/connection.php";

                                $no = 1;
                                $query = "SELECT * FROM pasien";
                                $results = $connect->query($query);

                                if ($results->num_rows === 0) {
                                    echo "<tr><td colspan='7' align='center'>Tidak ada data</td></tr>";
                                } else {
                                    while ($riwayat = $results->fetch_assoc()) {
                                        $pasien_id = $riwayat['id'];
                                        $details = $connect->query("SELECT 
                                            p.nama AS 'nama_pasien',
                                            pr.*,
                                            d.nama AS 'nama_dokter',
                                            dpo.keluhan AS 'keluhan',
                                            GROUP_CONCAT(o.nama_obat SEPARATOR ', ') AS 'obat'
                                            FROM periksa pr
                                            LEFT JOIN daftar_poli dpo ON (pr.id_daftar_poli = dpo.id)
                                            LEFT JOIN jadwal_periksa jp ON (dpo.id_jadwal = jp.id)
                                            LEFT JOIN dokter d ON (jp.id_dokter = d.id)
                                            LEFT JOIN pasien p ON (dpo.id_pasien = p.id)
                                            LEFT JOIN detail_periksa dp ON (pr.id = dp.id_periksa)
                                            LEFT JOIN obat o ON (dp.id_obat = o.id)
                                            WHERE dpo.id_pasien = '$pasien_id'
                                            GROUP BY pr.id
                                            ORDER BY pr.tgl_periksa DESC;");
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $riwayat['nama'] ?></td>
                                            <td><?= $riwayat['alamat'] ?></td>
                                            <td><?= $riwayat['no_ktp'] ?></td>
                                            <td><?= $riwayat['no_hp'] ?></td>
                                            <td><?= $riwayat['no_rm'] ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#detailModal<?= $riwayat['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail Riwayat Periksa</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="detailModal<?= $riwayat['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Riwayat <?= $riwayat['nama'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                            if ($details->num_rows === 0) :
                                                        ?>
                                                            <h5>Tidak Ditemukan Riwayat Periksa</h5>
                                                        <?php
                                                            else :
                                                        ?>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">No</th>
                                                                        <th scope="col">Tanggal Periksa</th>
                                                                        <th scope="col">Nama Pasien</th>
                                                                        <th scope="col">Nama Dokter</th>
                                                                        <th scope="col">Keluhan</th>
                                                                        <th scope="col">Catatan</th>
                                                                        <th scope="col">Obat</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $no = 1;
                                                                        while ($detail = $details->fetch_assoc()) :
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $no++ ?></td>
                                                                            <td><?= $detail['tgl_periksa'] ?></td>
                                                                            <td><?= $detail['nama_pasien'] ?></td>
                                                                            <td><?= $detail['nama_dokter'] ?></td>
                                                                            <td><?= $detail['keluhan'] ?></td>
                                                                            <td><?= $detail['catatan'] ?></td>
                                                                            <td><?= $detail['obat'] ?></td>
                                                                        </tr>
                                                                    <?php
                                                                        endwhile;
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        <?php
                                                            endif;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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