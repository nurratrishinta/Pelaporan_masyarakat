<?php
include '../../../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    if (empty($_POST['id_pengaduan']) || empty($_POST['id_petugas'])) {
        die("Pengaduan atau Petugas harus dipilih!");
    }

    // Ambil data dari form
    $id_pengaduan   = mysqli_real_escape_string($connect, $_POST['id_pengaduan']);
    $id_petugas     = mysqli_real_escape_string($connect, $_POST['id_petugas']);
    $tanggapan      = mysqli_real_escape_string($connect, $_POST['tanggapan']);
    $tgl_tanggapan  = mysqli_real_escape_string($connect, $_POST['tgl_tanggapan']);

    // Simpan ke database
    $query = "
        INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas)
        VALUES ('$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')
    ";

    if (mysqli_query($connect, $query)) {
        echo "<script>
                alert('Data berhasil disimpan');
                window.location.href='../../pages/tanggapan/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menyimpan data: " . mysqli_error($connect) . "');
                window.location.href='../../pages/tanggapan/create.php';
              </script>";
    }
}
?>
