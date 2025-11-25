<?php
// panggil koneksi
require_once __DIR__ . '/../../../config/connection.php';

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('tidak bisa memilih ID ini');
        window.location.href ='../../pages/pengaduan/index.php';
    </script>
    ";
    exit;
}

$id = intval($_GET['id']); // biar aman
$qSelect = "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'";
$result = mysqli_query($connect, $qSelect) or die("Query error: " . mysqli_error($connect));

$pengaduan = $result->fetch_object();
if (!$pengaduan) {
    die("Data tidak ditemukan");
}
?>
