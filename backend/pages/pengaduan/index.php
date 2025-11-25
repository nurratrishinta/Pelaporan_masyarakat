<?php
// Koneksi ke database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Query data pengaduan + join tanggapan
$qpengaduan = "
    SELECT p.id_pengaduan, p.tgl_pengaduan, p.nik, p.isi_laporan, p.foto, p.status
    FROM pengaduan p
    LEFT JOIN tanggapan t ON p.id_pengaduan = t.id_pengaduan
";

$result = mysqli_query($connect, $qpengaduan) or die("Query error: " . mysqli_error($connect));
?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Tabel Pengaduan -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0"><i class="bi bi-table"></i> Tabel Pengaduan</h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-hover text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>NO</th>
                                        <th>TGL_PENGADUAN</th>
                                        <th>NIK</th>
                                        <th>ISI_LAPORAN</th>
                                        <th>FOTO</th>
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
                                            <td><?= $item->tgl_pengaduan ?></td>
                                            <td><?= $item->nik ?></td>
                                            <td class="text-start"> <?= mb_strimwidth($item->isi_laporan, 0, 18, "...") ?></td>
                                            <td>
                                                <?php if (!empty($item->foto)): ?>
                                                    <img src="../../../storages/pengaduan/<?= $item->foto ?>"
                                                        alt="foto" width="100" height="100" class="img-thumbnail">
                                                <?php else: ?>
                                                    <span class="text-muted">-</span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <!-- Tombol Detail -->
                                                <a href="../pengaduan/detail.php?id=<?= $item->id_pengaduan ?>"
                                                    class="btn btn-sm btn-warning me-1"
                                                    title=" Liat Detail">
                                                    <i class="bi bi-info"></i>
                                                </a>

                                                <!-- Tombol Tanggapan -->
                                                <a href="liat.php?id=<?= $item->id_pengaduan ?>"
                                                    class="btn btn-sm btn-success"
                                                    title="Tanggapan">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endwhile;

                                    if ($no === 1) {
                                        echo '<tr><td colspan="7" class="text-center text-muted">Data tidak tersedia</td></tr>';
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