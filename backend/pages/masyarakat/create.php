<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// proses simpan
if (isset($_POST['submit'])) {
    $nik = mysqli_real_escape_string($connect, $_POST['nik']);
    $nama = mysqli_real_escape_string($connect, $_POST['nama']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $telp = mysqli_real_escape_string($connect, $_POST['telp']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $qInsert = "INSERT INTO masyarakat (nik, nama, username, password, telp)
                VALUES ('$nik', '$nama', '$username', '$password', '$telp')";

    if (mysqli_query($connect, $qInsert)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='./index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

<!-- Content -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Data Masyarakat</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
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
                                <label for="telp" class="form-label">No. Telp</label>
                                <input type="text" name="telp" id="telp" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <a href="./index.php" class="btn btn-secondary">Kembali</a>
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