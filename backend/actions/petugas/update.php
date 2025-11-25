<?php
include '../../../config/connection.php';

$id_petugas   = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$username     = $_POST['username'];
$telp         = $_POST['telp'];
$level        = $_POST['level'];
$password     = $_POST['password'];

// Kalau password baru diisi → hash, kalau kosong → jangan ubah
if (!empty($password)) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $q = "UPDATE petugas 
          SET nama_petugas='$nama_petugas', username='$username', password='$hashedPassword', telp='$telp', level='$level'
          WHERE id_petugas='$id_petugas'";
} else {
    $q = "UPDATE petugas 
          SET nama_petugas='$nama_petugas', username='$username', telp='$telp', level='$level'
          WHERE id_petugas='$id_petugas'";
}

if (mysqli_query($connect, $q)) {
    echo "<script>alert('Data berhasil diupdate'); window.location.href='../../pages/petugas/index.php';</script>";
} else {
    echo "Error: " . mysqli_error($connect);
}
?>