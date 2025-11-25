<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// misalnya nama user disimpan di $_SESSION['nama']
$nama = $_SESSION['nama'] ?? '';
?>

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Sambutan -->
        <div class="alert alert-info mb-4">
            Selamat Datang <strong><?= $nama ?></strong> di Aplikasi Pelaporan Pengaduan Masyarakat
            yang dibuat untuk melaporkan pelanggaran atau penyimpangan kejadian-kejadian yang ada pada masyarakat
        </div>

        <!-- content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tulis Data Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <form action="../../actions/pengaduan/store.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="bronInput" class="form-label">Tanggal Pengaduan</label>
                                <input type="date" name="tgl_pengaduan" class="form-control" id="bronInput" required>
                            </div>

                            <div class="mb-3">
                                <label for="nikInput" class="form-label">NIK</label>
                                <input type="text" name="nik" class="form-control" id="nikInput"
                                    placeholder="Masukan NIK..." required>
                            </div>

                            <div class="mb-3">
                                <label for="isi_laporanInput" class="form-label">Isi Laporan</label>
                                <textarea name="isi_laporan" class="form-control" id="isi_laporanInput"
                                    placeholder="Masukan isi laporan..." required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="fotoInput" class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control" id="fotoInput" required>
                            </div>

                            <button type="submit" class="btn btn-success" name="tombol">Tambah</button>
                            <a href="./index.php" class="btn btn-primary">Kembali</a>
                        </form>
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