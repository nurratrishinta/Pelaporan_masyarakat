<?php
include '../../app.php';
include './show.php'; // koneksi


if (isset($_POST['tombol'])) {
    $tgl_tanggapan = escapeString($_POST['tgl_tanggapan']);
    $tanggapan = escapeString($_POST['tanggapan']);
    
  


   
    $qUpdate = "UPDATE tanggapan 
                SET tgl_tanggapan='$tgl_tanggapan', tanggapan='$tanggapan','";


    $result = mysqli_query($connect, $qUpdate);

    if ($result) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href='../../pages/tanggapan/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal diubah: " . mysqli_error($connect) . "');
                window.location.href='../../pages/tanggapan/edit.php';
              </script>";
    }
} else {
    // kalau file ini diakses langsung tanpa submit
    header("Location: ../../pages/tanggapan/index.php");
    exit;
}
?>
