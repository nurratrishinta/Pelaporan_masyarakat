<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ambil data petugas berdasarkan id
$id = $_GET['id'];
$q = "SELECT * FROM petugas WHERE id_petugas = '$id'";
$result = mysqli_query($connect, $q);
$petugas = mysqli_fetch_object($result);
?>

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Ubah Data Petugas</h5>
                    </div>
                    <div class="card-body">
                        <form action="../../actions/petugas/update.php" method="POST">
                            <input type="hidden" name="id_petugas" value="<?= $petugas->id_petugas ?>">

                            <div class="mb-3">
                                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                                <input type="text" name="nama_petugas" id="nama_petugas"
                                    class="form-control" value="<?= $petugas->nama_petugas ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username"
                                    class="form-control" value="<?= $petugas->username ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" value="<?= htmlspecialchars($petugas->password) ?>" class="form-control">
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="bi bi-eye" id="iconPassword"></i>
                                    </button>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="text" name="telp" id="telp"
                                    class="form-control" value="<?= $petugas->telp ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="admin" <?= $petugas->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="petugas" <?= $petugas->level == 'petugas' ? 'selected' : '' ?>>Petugas</option>
                                </select>
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

<!-- Script toggle password -->
<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");
    const iconPassword = document.querySelector("#iconPassword");

    togglePassword.addEventListener("click", function() {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        iconPassword.classList.toggle("bi-eye");
        iconPassword.classList.toggle("bi-eye-slash");
    });
</script>


<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>