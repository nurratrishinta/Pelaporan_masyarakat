<?php
session_start();
require_once __DIR__ . '/../../../config/connection.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username && $password) {
    // ===== CEK MASYARAKAT =====
    $q = "SELECT * FROM masyarakat WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($connect, $q);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id']  = $user['id_masyarakat']; // pakai nama kolom yang benar
        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = 'masyarakat';
        header("Location: ../../pages/pengaduan/create.php");
        exit;
    }

    // ===== CEK PETUGAS / ADMIN =====
    $q = "SELECT * FROM petugas WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($connect, $q);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id']  = $user['id_petugas'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = strtolower($user['level']); // admin / petugas
        header("Location: ../../pages/dashboard/index.php");
        exit;
        header("Location: ../../pages/pengaduan/verifikasi.php");
        exit;
        header("Location: ../../pages/tanggapan/index.php");
        exit;
    }


} else {
    header("Location: ../../pages/auth/login.php");
    exit;
}
?>
