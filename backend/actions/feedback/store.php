<?php
include '../../../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_tanggapan'];
    $feedback = $_POST['feedback_petugas'];

    $query = "UPDATE tanggapan SET feedback_petugas = ? WHERE id_tanggapan = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "si", $feedback, $id);
    $exec = mysqli_stmt_execute($stmt);

    if ($exec) {
        header("Location: ../../pages/tanggapan/index.php?msg=feedback_sukses");
        exit;
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>