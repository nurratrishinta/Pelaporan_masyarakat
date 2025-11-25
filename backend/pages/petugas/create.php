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
                                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="text" name="telp" id="telp" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
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
