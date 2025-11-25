<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ambil data dari tabel tanggapan
$qtanggapan = "
    SELECT id_tanggapan, tgl_tanggapan, tanggapan, feedback_petugas
    FROM tanggapan
    ORDER BY tgl_tanggapan DESC
";

$result = mysqli_query($connect, $qtanggapan) or die("Query error: " . mysqli_error($connect));
?>

<!-- Tambahkan Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
    html,
    body {
        height: 50%;
        margin: 0;
    }

    .body-wrapper {
        min-height: 89vh;
        /* tinggi penuh layar */
        display: flex;
        flex-direction: column;
    }

    .content-area {
        flex: 1;
        /* isi mendorong footer ke bawah */
        padding: 10px;
    }

    table.table td,
    table.table th {
        white-space: normal !important;
        word-wrap: break-word;
    }
    
</style>


<div class="body-wrapper">
    <div class="container-fluid content-area">
        <!-- konten utama -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Tabel Tanggapan</h5>
                        <a href="./create.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>NO</th>
                                    <th>TGL_TANGGAPAN</th>
                                    <th>TANGGAPAN</th>
                                    <th>FEEDBACK PETUGAS</th>
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
                                        <td><?= $item->tgl_tanggapan ?></td>
                                        <td><?= $item->tanggapan ?></td>
                                        <td>
                                            <?= $item->feedback_petugas ?: '<span class="text-muted">Belum ada</span>' ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn btn-sm btn-info"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#feedbackModal<?= $item->id_tanggapan ?>">
                                                    <i class="bi bi-chat-square-text"></i> Feedback
                                                </button>
                                                <a href="./edit.php?id=<?= $item->id_tanggapan ?>"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="../../actions/tanggapan/destroy.php?id=<?= $item->id_tanggapan ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Feedback -->
                                    <div class="modal fade" id="feedbackModal<?= $item->id_tanggapan ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="../../actions/feedback/store.php" method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Feedback Petugas</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_tanggapan" value="<?= $item->id_tanggapan ?>">
                                                        <div class="mb-3">
                                                            <label class="form-label">Tanggapan</label>
                                                            <input type="text" class="form-control" value="<?= $item->tanggapan ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Feedback Petugas</label>
                                                            <textarea name="feedback_petugas" class="form-control" rows="3" required><?= $item->feedback_petugas ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bi bi-save"></i> Simpan
                                                        </button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $no++;
                                endwhile;
                                if ($no === 1) {
                                    echo '<tr><td colspan="5" class="text-center">Data tidak tersedia</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer sticky -->
    <footer class="py-3 text-center text-white"
        style="background: linear-gradient(90deg, #4facfe 0%, #6a11cb 100%);">
        <p class="mb-0 fs-5">Aplikasi Pelaporan Pengaduan Masyarakat 2025 - by Shinta</p>
    </footer>
</div>

<?php
include '../../partials/script.php';
?>