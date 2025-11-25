<?php
// panggil koneksi
require_once __DIR__ . '/../../../config/connection.php';

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('tidak bisa memilih ID ini');
        window.location.href ='../../pages/tanggapan/index.php';
    </script>
    ";
    exit;
}

$id = intval($_GET['id']); // biar aman
$qSelect = "SELECT * FROM tanggapan WHERE id_tanggapan = '$id'";
$result = mysqli_query($connect, $qSelect) or die("Query error: " . mysqli_error($connect));

$tanggapan = $result->fetch_object();
if (!$tanggapan) {
    die("Data tidak ditemukan");
}
?>
