<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Obat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Poliklinik BK</a></li>
                    <li class="breadcrumb-item active">Obat</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title my-2">Form Tambah Data Obat</div>
                </div>
                <div class="card-body">
                    <?php
                        include "../../../config/connection.php";

                        $id = "";
                        $nama_obat = "";
                        $kemasan = "";
                        $harga = "";
                        
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = "SELECT * FROM obat WHERE id = ?";
                            $stmt = $connect->prepare($query);
                            $stmt->bind_param("i", $id);
                            $stmt->execute();
                        
                            $result = $stmt->get_result();
                        
                            while ($obat = $result->fetch_assoc()) {
                                $nama_obat = $obat['nama_obat'];
                                $kemasan = $obat['kemasan'];
                                $harga = $obat['harga'];
                            }
                        
                            $stmt->close();
                        }
                    ?>
                    <form action="<?= $id != "" ? "$BASE_ADMIN_CONTROLLERS/obat/update.php?id=$id" : "$BASE_ADMIN_CONTROLLERS/obat/create.php" ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="form-group">
                            <label class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" name="obat" placeholder="Nama Obat" value="<?= $nama_obat ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kemasan</label>
                            <input type="text" class="form-control" name="kemasan" placeholder="Kemasan" value="<?= $kemasan ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" placeholder="Harga" value="<?= $harga ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card card-secondary">
                <div class="card-header">
                    <p class="my-2 card-title">Tabel Data Obat</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Kemasan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                include "../../../config/connection.php";

                                $no = 1;
                                $query = "SELECT * FROM obat";
                                $results = mysqli_query($connect, $query);

                                while ($obat = mysqli_fetch_assoc($results)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $obat['nama_obat'] ?></td>
                                    <td><?= $obat['kemasan'] ?></td>
                                    <td><?= $obat['harga'] ?></td>
                                    <td>
                                    <a class="btn btn-success rounded-pill px-3" href="<?= $BASE_ADMIN_PAGES."?page=obat&id=".$obat['id'] ?>">Edit</a>
                                    <a class="btn btn-danger rounded-pill px-3" href="<?= $BASE_ADMIN_CONTROLLERS."/obat/delete.php?id=".$obat['id'] ?>">Hapus</a>
                                    </td>
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