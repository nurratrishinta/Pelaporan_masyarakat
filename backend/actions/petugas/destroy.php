<?php
include '../../app.php';
include './show.php'; // harus menghasilkan $petugas

// pastikan id aman (cast ke integer)
$id = (int) $petugas->id_petugas;

// cek ada berapa tanggapan yang memakai petugas ini
$qCheck = "SELECT COUNT(*) AS total FROM tanggapan WHERE id_petugas = '$id'";
$rCheck = mysqli_query($connect, $qCheck) or die(mysqli_error($connect));
$total = (int) mysqli_fetch_assoc($rCheck)['total'];

if ($total > 0) {
    echo "
        <script>
            alert('Tidak bisa menghapus: petugas ini masih digunakan di tabel tanggapan (jumlah: $total). Hapus atau alihkan tanggapan terlebih dahulu.');
            window.location.href='../../pages/petugas/index.php';
        </script>
    ";
    exit;
}

// kalau tidak ada dependensi, hapus petugas
$qDelete = "DELETE FROM petugas WHERE id_petugas = '$id'";
$result  = mysqli_query($connect, $qDelete);

if ($result) {
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            window.location.href='../../pages/petugas/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            window.location.href='../../pages/petugas/index.php';
        </script>
    ";
}
?>
