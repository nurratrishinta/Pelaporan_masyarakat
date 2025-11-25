<?php
include '../../../config/connection.php'; // pastikan path benar

if (isset($_POST['tombol'])) {
    // Escape input untuk keamanan
    $nik = mysqli_real_escape_string($connect, $_POST['nik']);
    $nama = mysqli_real_escape_string($connect, $_POST['nama']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $telp = mysqli_real_escape_string($connect, $_POST['telp']);

    // Insert ke database
    $qInsert = "INSERT INTO masyarakat (nik, nama, username, password, telp) 
                VALUES ('$nik', '$nama', '$username', '$password', '$telp')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            window.location.href='../../pages/masyarakat/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan: " . mysqli_error($connect) . "');
            window.location.href='../../pages/masyarakat/create.php';
        </script>
        ";
    }
}
?>
