<?php
include '../../app.php';
include './show.php'; // ini sudah ambil $pengaduan berdasarkan id di URL

// hapus data
$qDelete = "DELETE FROM pengaduan WHERE id_pengaduan = '$pengaduan->id_pengaduan'";
$result  = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil dihapus atau tidak
if ($result) {
    echo " 
        <script>    
            alert('Data Berhasil Dihapus');
            window.location.href='../../pages/pengaduan/index.php';
        </script>
    ";
} else {
    echo " 
        <script>    
            alert('Data Gagal Dihapus');
            window.location.href='../../pages/pengaduan/index.php';
        </script>
    ";
}
?>
