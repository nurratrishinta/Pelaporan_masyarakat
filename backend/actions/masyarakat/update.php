<?php
include '../../../config/connection.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}

$id = intval($_GET['id']); // id masyarakat

$nik      = mysqli_real_escape_string($connect, $_POST['nik']);
$nama     = mysqli_real_escape_string($connect, $_POST['nama']);
$username = mysqli_real_escape_string($connect, $_POST['username']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$telp     = mysqli_real_escape_string($connect, $_POST['telp']);

// 🔹 Ambil nik lama sebelum diupdate
$qOld = mysqli_query($connect, "SELECT nik FROM masyarakat WHERE id=$id");
if (!$qOld || mysqli_num_rows($qOld) == 0) {
    die("Data masyarakat tidak ditemukan!");
}
$oldData = mysqli_fetch_assoc($qOld);
$oldNik  = $oldData['nik'];

// 🔹 Update masyarakat
$qUpdateMasyarakat = "
    UPDATE masyarakat 
    SET nik='$nik',
        nama='$nama',
        username='$username',
        password='$password',
        telp='$telp'
    WHERE id=$id
";

if (mysqli_query($connect, $qUpdateMasyarakat)) {
    // 🔹 Jika nik berubah, update juga di tabel pengaduan
    if ($oldNik !== $nik) {
        $qUpdatePengaduan = "UPDATE pengaduan SET nik='$nik' WHERE nik='$oldNik'";
        mysqli_query($connect, $qUpdatePengaduan);
    }

    echo "<script>
            alert('Data masyarakat berhasil diubah');
            window.location.href='../../pages/masyarakat/index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal diubah: " . mysqli_error($connect) . "');
            window.location.href='../../pages/masyarakat/edit.php?id=$id';
          </script>";
}
?>
