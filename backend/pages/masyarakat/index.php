<?php
// koneksi database
include '../../../config/connection.php';   // pastikan path benar
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ====== QUERY AMBIL DATA MASYARAKAT + JOIN PENGADUAN ======
$qMasyarakat = "
    SELECT m.id, m.nik, m.nama, m.username, m.password, m.telp
    FROM masyarakat m
    LEFT JOIN pengaduan p ON m.nik = p.nik
    GROUP BY m.id, m.nik, m.nama, m.username, m.password, m.telp
";

$result = mysqli_query($connect, $qMasyarakat) or die("Query error: " . mysqli_error($connect));
?>

<!-- Tambahkan Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Tabel Masyarakat -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Tabel Masyarakat</h5>
                        <a href="./create.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>USERNAME</th>
                                        <th>PASSWORD</th>
                                        <th>NO TELP</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($item = $result->fetch_object()):
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $item->nik ?></td>
                                            <td><?= $item->nama ?></td>
                                            <td><?= $item->username ?></td>
                                            <td>
                                                <span class="password-hidden">
                                                    <?= str_repeat('*', min(10, strlen($item->password))) ?>
                                                </span>

                                            </td>
                                            <td><?= $item->telp ?></td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="../../actions/masyarakat/destroy.php?id=<?= $item->id ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>

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
<!-- End Content Wrapper -->

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>