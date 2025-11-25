<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ambil data tanggapan berdasarkan id
$id = $_GET['id'];
$q = "SELECT * FROM tanggapan WHERE id_tanggapan = '$id'";
$result = mysqli_query($connect, $q);
$tanggapan = mysqli_fetch_object($result);
?>

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Ubah Data tanggapan</h5>
                    </div>
                    <div class="card-body">
                        <form action="../../actions/tanggapan/update.php" method="POST">
                            <input type="hidden" name="id_tanggapan" value="<?= $tanggapan->id_tanggapan ?>">

                            <div class="mb-3">
                                <label for="tgl_tanggapan" class="form-label">Nama tanggapan</label>
                                <input type="date" name="tgl_tanggapan" id="tgl_tanggapan"
                                    class="form-control" value="<?= $tanggapan->tgl_tanggapan ?>" required>
                            </div>


                            <div class="mb-3">
                                <label for="tanggapan" class="form-label">tanggapan</label>
                                <input type="text" name="tanggapan" id="tanggapan"
                                    class="form-control" value="<?= $tanggapan->tanggapan ?>" required>
                            </div>



                            <button type="submit" class="btn btn-success">Simpan</button>
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