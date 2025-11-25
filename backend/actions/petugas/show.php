<?php
// panggil koneksi
require_once __DIR__ . '/../../../config/connection.php';

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('tidak bisa memilih ID ini');
        window.location.href ='../../pages/petugas/index.php';
    </script>
    ";
    exit;
}

$id = intval($_GET['id']); // biar aman
$qSelect = "SELECT * FROM petugas WHERE id_petugas = '$id'";
$result = mysqli_query($connect, $qSelect) or die("Query error: " . mysqli_error($connect));

$petugas = $result->fetch_object();
if (!$petugas) {
    die("Data tidak ditemukan");
}
?>
