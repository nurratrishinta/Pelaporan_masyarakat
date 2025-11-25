<?php
include '../../../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_petugas = mysqli_real_escape_string($connect, $_POST['nama_petugas']);
    $username     = mysqli_real_escape_string($connect, $_POST['username']);
    $password     = mysqli_real_escape_string($connect, $_POST['password']);
    $telp         = mysqli_real_escape_string($connect, $_POST['telp']);
    $level        = mysqli_real_escape_string($connect, $_POST['level']);

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $qInsert = "INSERT INTO petugas (nama_petugas, username, password, telp, level)
                VALUES ('$nama_petugas', '$username', '$hashedPassword', '$telp', '$level')";

    if (mysqli_query($connect, $qInsert)) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href='../../pages/petugas/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan: " . mysqli_error($connect) . "');
                window.location.href='../../pages/petugas/create.php';
              </script>";
    }
}
?>
