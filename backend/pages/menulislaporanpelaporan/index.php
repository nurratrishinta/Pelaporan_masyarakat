<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// otomatis ambil tanggal hari ini
$tanggal = date("d/m/Y");

// misalnya NIK sudah ada di session masyarakat login
session_start();
$nik = isset($_SESSION['nik']) ? $_SESSION['nik'] : '';
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Tulis Pengaduan</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/pengaduan/store.php" method="POST" enctype="multipart/form-data">

                    <!-- Tanggal Pengaduan -->
                    <div class="mb-3">
                        <label class="form-label">Tanggal Pengaduan</label>
                        <input type="text" name="tgl_pengaduan" value="<?= $tanggal ?>" class="form-control" readonly>
                    </div>

                    <!-- NIK -->
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik" value="<?= htmlspecialchars($nik) ?>" class="form-control" readonly>
                    </div>

                    <!-- Tulis Laporan -->
                    <div class="mb-3">
                        <label class="form-label">Tulis Laporan</label>
                        <textarea name="isi_laporan" rows="5" class="form-control" required></textarea>
                    </div>

                    <!-- Upload Foto -->
                    <div class="mb-3">
                        <label class="form-label">Unggah Foto</label>
                        <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png">
                        <small class="text-muted">Tipe yang bisa diupload: .jpg, .jpeg, .png</small>
                    </div>

                    <!-- Tombol -->
                    <button type="submit" name="tombol" class="btn btn-primary">Kirim</button>
                    <a href="../../pages/pengaduan/index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>