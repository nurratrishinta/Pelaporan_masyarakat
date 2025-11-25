<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ambil data petugas (tanpa password, lebih aman)
$qpetugas = "SELECT id_petugas, nama_petugas, username, telp, level FROM petugas";
$result   = mysqli_query($connect, $qpetugas) or die("Query error: " . mysqli_error($connect));
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<div class="body-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Tabel Petugas</h5>
                        <a href="./create.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-hover align-middle">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA PETUGAS</th>
                                        <th>USERNAME</th>
                                        <th>PASSWORD</th>
                                        <th>TELP</th>
                                        <th>LEVEL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($item = $result->fetch_object()):
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td><?= htmlspecialchars($item->nama_petugas) ?></td>
                                            <td><?= htmlspecialchars($item->username) ?></td>
                                            <td class="text-center">*</td>
                                            <td><?= htmlspecialchars($item->telp) ?></td>
                                            <td class="text-center"><?= ucfirst($item->level) ?></td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="./edit.php?id=<?= $item->id_petugas ?>"
                                                        class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <!-- <a href="../../actions/petugas/destroy.php?id=<?= $item->id_petugas ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                                        title="Hapus">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </a> -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endwhile;

                                    if ($no === 1) {
                                        echo '<tr><td colspan="7" class="text-center">Data tidak tersedia</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>