<?php
include '../../../config/connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // update status jadi "proses"
    $qUpdate = "UPDATE pengaduan SET status = 'proses' WHERE id_pengaduan = $id";
    mysqli_query($connect, $qUpdate);

    echo "
    <script>
        alert('Pengaduan berhasil diverifikasi!');
        window.location.href='../../pages/pengaduan/index.php';
    </script>
    ";
} else {
    header("Location: ../../pages/pengaduan/index.php");
}
?>
