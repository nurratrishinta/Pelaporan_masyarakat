<?php
require_once __DIR__ . '/../../../config/connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $telp = $_POST['telp'];
    $nik = $_POST['nik'];

    $q = "INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $q);
    mysqli_stmt_bind_param($stmt, "sssss", $nik, $nama, $username, $password, $telp);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Pendaftaran berhasil! Silakan login'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Gagal mendaftar'); window.location='register.php';</script>";
    }
}
?>
