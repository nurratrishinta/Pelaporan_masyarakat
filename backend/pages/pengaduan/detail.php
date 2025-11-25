<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Ambil data pengaduan berdasarkan ID
include '../../actions/pengaduan/show.php';
?>

<!-- CSS supaya konten tidak ketutupan sidebar -->
<style>
    .content-wrapper {
        margin-left: 250px;
        /* samakan dengan lebar sidebar */
        padding: 20px;
    }

    @media (max-width: 992px) {
        .content-wrapper {
            margin-left: 0;
            /* biar rapi di HP */
        }
    }
</style>

<!-- Content -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Detail Data Pengaduan</h5>
                </div>
                <div class="card-body">
                    <form>

                        <!-- Tanggal Pengaduan -->
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pengaduan</label>
                            <input type="date" class="form-control" value="<?= htmlspecialchars($pengaduan->tgl_pengaduan) ?>" disabled>
                        </div>

                        <!-- NIK -->
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($pengaduan->nik) ?>" disabled>
                        </div>

                        <!-- Isi Laporan -->
                        <div class="mb-3">
                            <label class="form-label">Isi Laporan</label>
                            <textarea class="form-control" rows="4" disabled><?= htmlspecialchars($pengaduan->isi_laporan) ?></textarea>
                        </div>

                        <!-- Foto -->
                        <div class="mb-3">
                            <label class="form-label">Foto</label><br>
                            <?php if (!empty($pengaduan->foto)): ?>
                                <img class="w-25 mb-2" src="../../../storages/pengaduan/<?= $pengaduan->foto ?>" alt="Foto Pengaduan">
                            <?php else: ?>
                                <p class="text-muted">Tidak ada foto</p>
                            <?php endif; ?>
                        </div>


                        <!-- Tombol Aksi -->
                        <a href="../../pages/pengaduan/index.php" class="btn btn-success">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        <a href="../../actions/pengaduan/verify.php?id=<?= $pengaduan->id_pengaduan ?>"
                            class="btn btn-warning">
                            <i class="bi bi-check-square"></i> Proses Verifikasi
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>