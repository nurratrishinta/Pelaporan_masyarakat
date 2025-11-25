<?php
include '../../../config/connection.php'; // pastikan path benar

if (isset($_POST['tombol'])) {
    // Ambil data dari form
    $tgl_pengaduan = !empty($_POST['tgl_pengaduan']) ? mysqli_real_escape_string($connect, $_POST['tgl_pengaduan']) : date('Y-m-d');
    $nik           = !empty($_POST['nik']) ? mysqli_real_escape_string($connect, $_POST['nik']) : '';
    $isi_laporan   = !empty($_POST['isi_laporan']) ? mysqli_real_escape_string($connect, $_POST['isi_laporan']) : '';

    // Validasi status
    $allowedStatus = ['0', 'proses', 'selesai'];
    $status = (!empty($_POST['status']) && in_array($_POST['status'], $allowedStatus))
        ? $_POST['status']
        : 'proses';

    // Cek apakah NIK ada di tabel masyarakat
    $cekNik = mysqli_query($connect, "SELECT nik FROM masyarakat WHERE nik = '$nik' LIMIT 1");
    if (mysqli_num_rows($cekNik) == 0) {
        echo "
        <script>
            alert('NIK tidak ditemukan di tabel masyarakat. Silakan daftarkan masyarakat terlebih dahulu.');
            window.location.href='../../pages/pengaduan/create.php';
        </script>
        ";
        exit;
    }

    // Handle upload foto
    $fotoNew = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $fotoNew = time() . "." . $ext;

        $storages = "../../../storages/pengaduan/";
        move_uploaded_file($_FILES['foto']['tmp_name'], $storages . $fotoNew);
    }

    // Insert ke database
    $qInsert = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status)
                VALUES ('$tgl_pengaduan', '$nik', '$isi_laporan', '$fotoNew', '$status')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            window.location.href='../../pages/pengaduan/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan: " . mysqli_error($connect) . "');
            window.location.href='../../pages/pengaduan/create.php';
        </script>
        ";
    }
}
?>
