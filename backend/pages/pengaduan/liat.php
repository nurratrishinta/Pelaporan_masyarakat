<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// koneksi database
include '../../../config/connection.php';

// ambil ID pengaduan dari URL
$id_pengaduan = $_GET['id'] ?? null;

if (!$id_pengaduan) {
    die('ID pengaduan tidak ditemukan');
}

// ambil data pengaduan + tanggapan terbaru
$query = "
    SELECT p.*, t.tgl_tanggapan, t.tanggapan
    FROM pengaduan p
    LEFT JOIN tanggapan t ON p.id_pengaduan = t.id_pengaduan
    WHERE p.id_pengaduan = '$id_pengaduan'
    ORDER BY t.id_tanggapan DESC
    LIMIT 1
";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
$data = mysqli_fetch_object($result);
?>

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Lihat Tanggapan</h5>
                    </div>
                    <div class="card-body">
                        <!-- Tombol kembali -->
                        <a href="../pengaduan/index.php" class="btn btn-success mb-3">
                            <i class="bi bi-arrow-left-circle"></i> Kembali
                        </a>

                        <!-- Data tanggapan -->
                        <?php if (is_null($data->tanggapan) || $data->tanggapan === ''): ?>
                            <p class="text-danger">
                                Mohon bersabar, Pengaduan belum ditanggapi
                            </p>
                        <?php else: ?>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Tanggapan</label>
                                <input type="text" class="form-control"
                                    value="<?= $data->tgl_tanggapan ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Isi Tanggapan</label>
                                <textarea class="form-control" rows="4" disabled><?= $data->tanggapan ?></textarea>
                            </div>
                        <?php endif; ?>

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