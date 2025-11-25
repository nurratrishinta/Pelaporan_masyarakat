<?php
include '../../../config/connection.php';

// ambil data pengaduan
$query = "
    SELECT p.id_pengaduan, p.tgl_pengaduan, p.nik, p.isi_laporan, p.foto, p.status
    FROM pengaduan p
    LEFT JOIN tanggapan t ON p.id_pengaduan = t.id_pengaduan
";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Print Data Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 6px;
            text-align: center;
        }

        .text-start {
            text-align: left;
        }

        img {
            max-width: 80px;
            max-height: 80px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        .no-print {
            margin-bottom: 15px;
        }
    </style>
</head>

<body onload="window.print()">

    <!-- Tombol kembali ke index pengaduan -->
    <div class="no-print">
        <a href="../../pages/laporan/index.php">
            <button>⬅ Kembali</button>
        </a>
    </div>

    <h2>Laporan Data Pengaduan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>NIK</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['tgl_pengaduan']}</td>
                        <td>{$row['nik']}</td>
                        <td class='text-start'>{$row['isi_laporan']}</td>
                        <td>";
                if (!empty($row['foto'])) {
                    echo "<img src='../../../storages/pengaduan/{$row['foto']}' alt='foto'>";
                } else {
                    echo "<span>-</span>";
                }
               
                $no++;
            }

            if ($no === 1) {
                echo "<tr><td colspan='6' class='text-center'>Data tidak tersedia</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>