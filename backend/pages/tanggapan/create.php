<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Data Petugas</h5>
                    </div>
                    <div class="card-body">
                        <form action="../../actions/petugas/store.php" method="POST">
                            <div class="mb-3">
                                <label for="tgl_tanggapan" class="form-label">Tgl_tanggapan</label>
                                <input type="date" name="tgl_tanggapan" id="tgl_tanggapan" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggapan" class="form-label">Tanggapan</label>
                                <input type="text" name="tanggapan" id="tanggapan" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="feedback" class="form-label">Feedback Petugas</label>
                                <textarea class="form-control" name="feedback" id="feedback" rows="3"></textarea>
                            </div>


                            <button type="submit" name="tombol" class="btn btn-success">Simpan</button>
                            <a href="./index.php" class="btn btn-info">Kembali</a>
                        </form>
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