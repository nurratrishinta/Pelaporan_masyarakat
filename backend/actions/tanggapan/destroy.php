<?php
include '../../app.php';
include './show.php'; // ini sudah ambil $tanggapan berdasarkan id di URL

// hapus data
$qDelete = "DELETE FROM tanggapan WHERE id_tanggapan = '$tanggapan->id_tanggapan'";
$result  = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil dihapus atau tidak
if ($result) {
    echo " 
        <script>    
            alert('Data Berhasil Dihapus');
            window.location.href='../../pages/tanggapan/index.php';
        </script>
    ";
} else {
    echo " 
        <script>    
            alert('Data Gagal Dihapus');
            window.location.href='../../pages/tanggapan/index.php';
        </script>
    ";
}
?>
