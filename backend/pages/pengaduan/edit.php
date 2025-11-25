<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ambil data berdasarkan id
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

<!-- content -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Ubah Data Pengaduan</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="../../actions/pengaduan/update.php" enctype="multipart/form-data">

                        <!-- hidden input id -->
                        <input type="hidden" name="id" value="<?= $pengaduan->id_pengaduan ?>">

                        <div class="mb-3">
                            <label for="tgl_pengaduanInput" class="form-label">Tanggal Pengaduan</label>
                            <input type="date" name="tgl_pengaduan" id="tgl_pengaduanInput"
                                value="<?= htmlspecialchars($pengaduan->tgl_pengaduan) ?>"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="nikInput" class="form-label">NIK</label>
                            <input type="text" name="nik" id="nikInput"
                                value="<?= htmlspecialchars($pengaduan->nik) ?>"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi_laporanInput" class="form-label">Isi Laporan</label>
                            <textarea name="isi_laporan" id="isi_laporanInput"
                                class="form-control" rows="4" required><?= htmlspecialchars($pengaduan->isi_laporan) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <img class="w-25 mb-2" src="../../../storages/pengaduan/<?= $pengaduan->foto ?>" alt="Foto Pengaduan">
                            <label for="fotoInput" class="form-label">Pilih Foto Baru (opsional)</label>
                            <input type="file" name="foto" class="form-control" id="fotoInput">
                        </div>

                        <div class="mb-3">
                            <label for="statusInput" class="form-label">Status</label>
                            <select name="status" id="statusInput" class="form-control" required>
                                <option value="proses" <?= $pengaduan->status == 'proses' ? 'selected' : '' ?>>Proses</option>
                                <option value="selesai" <?= $pengaduan->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success" name="tombol">Simpan</button>
                        <a href="../../pages/pengaduan/index.php" class="btn btn-primary">Kembali</a>
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