<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// cek id
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// ambil data berdasarkan id
$qSelect = "SELECT * FROM masyarakat WHERE id = $id";
$res = mysqli_query($connect, $qSelect) or die("Query error: " . mysqli_error($connect));

if (mysqli_num_rows($res) === 0) {
    echo "<script>alert('Data tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($res);

// proses update
if (isset($_POST['submit'])) {
    $nik = mysqli_real_escape_string($connect, $_POST['nik']);
    $nama = mysqli_real_escape_string($connect, $_POST['nama']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $telp = mysqli_real_escape_string($connect, $_POST['telp']);

    // cek password
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $qUpdate = "UPDATE masyarakat 
                    SET nik='$nik', nama='$nama', username='$username', password='$password', telp='$telp'
                    WHERE id=$id";
    } else {
        $qUpdate = "UPDATE masyarakat 
                    SET nik='$nik', nama='$nama', username='$username', telp='$telp'
                    WHERE id=$id";
    }

    if (mysqli_query($connect, $qUpdate)) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='./index.php';</script>";
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
                        <h5>Edit Data Masyarakat</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control"
                                    value="<?= htmlspecialchars($data['nik']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="<?= htmlspecialchars($data['nama']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    value="<?= htmlspecialchars($data['username']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password (kosongkan jika tidak diubah)</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="telp" class="form-label">No. Telp</label>
                                <input type="text" name="telp" id="telp" class="form-control"
                                    value="<?= htmlspecialchars($data['telp']) ?>" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
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