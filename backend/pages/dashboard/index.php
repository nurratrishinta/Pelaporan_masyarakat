<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
require_once __DIR__ . '/../../../config/connection.php';

// ====== HITUNG DATA ======
$qPetugas = mysqli_query($connect, "SELECT COUNT(*) AS total FROM petugas");
$jumlahPetugas = mysqli_fetch_assoc($qPetugas)['total'];

$qMasyarakat = mysqli_query($connect, "SELECT COUNT(*) AS total FROM masyarakat");
$jumlahMasyarakat = mysqli_fetch_assoc($qMasyarakat)['total'];

$qLaporan = mysqli_query($connect, "SELECT COUNT(*) AS total FROM pengaduan");
$jumlahLaporan = mysqli_fetch_assoc($qLaporan)['total'];

// ====== DATA LAPORAN BULANAN PER STATUS ======
$qBulanan = mysqli_query($connect, "
    SELECT 
        MONTH(tgl_pengaduan) AS bulan,
        SUM(CASE WHEN status = '0' THEN 1 ELSE 0 END) AS pending,
        SUM(CASE WHEN status = 'proses' THEN 1 ELSE 0 END) AS proses,
        SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) AS selesai
    FROM pengaduan 
    GROUP BY MONTH(tgl_pengaduan)
    ORDER BY bulan ASC
");

$namaBulan = [
    1 => "Januari",
    2 => "Febrari",
    3 => "Mareut",
    4 => "April",
    5 => "Mei",
    6 => "Juni",
    7 => "Juli",
    8 => "Agustus",
    9 => "Septober",
    11 => "Novtember",
    10 => "Okember",
    12 => "Desember"
];

$bulanLabels = [];
$dataPending = [];
$dataProses = [];
$dataSelesai = [];

while ($row = mysqli_fetch_assoc($qBulanan)) {
    $bulanLabels[] = $namaBulan[$row['bulan']];
    $dataPending[] = $row['pending'];
    $dataProses[] = $row['proses'];
    $dataSelesai[] = $row['selesai'];
}
?>

<div class="page-wrapper" style="margin-left:300px; min-height:100vh; background-color:#f8f9fa;">
    <div class="container-fluid py-4">
        <h3 class="mb-4 fw-bold">Data - data Pelaporan Masyarakat</h3>

        <!-- Cards -->
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-lg-4">
                <a href="../petugas/index.php" class="text-decoration-none">
                    <div class="card text-white bg-primary shadow-sm border-0 h-300">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-white">Petugas</h6>
                                <h2 class="fw-bold text-white"><?= $jumlahPetugas ?></h2>
                            </div>
                            <i class="fas fa-user-tie fa-2x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-4">
                <a href="../masyarakat/index.php" class="text-decoration-none">
                    <div class="card text-white bg-success shadow-sm border-0 h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-white">Masyarakat</h6>
                                <h2 class="fw-bold text-white"><?= $jumlahMasyarakat ?></h2>
                            </div>
                            <i class="fas fa-users fa-2x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-4">
                <a href="../pengaduan/index.php" class="text-decoration-none">
                    <div class="card text-white bg-danger shadow-sm border-0 h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-white">Laporan</h6>
                                <h2 class="fw-bold text-white"><?= $jumlahLaporan ?></h2>
                            </div>
                            <i class="fas fa-file-alt fa-2x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Grafik -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h5 class="card-title mb-4">Total Laporan Bulanan</h5>
                <canvas id="laporanBulananChart" height="100"></canvas>
            </div>
        </div>

        <!-- Tabel Ringkasan -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title mb-4">Ringkasan Laporan Bulanan</h5>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Bulan</th>
                            <th>Proses</th>
                            <th>Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bulanLabels as $i => $bln) : ?>
                            <tr>
                                <td><?= $bln ?></td>
                                <td><?= $dataProses[$i] ?></td>
                                <td><?= $dataSelesai[$i] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('laporanBulananChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($bulanLabels) ?>,
            datasets: [

                {
                    label: 'Proses',
                    data: <?= json_encode($dataProses) ?>,
                    backgroundColor: 'rgba(0,123,255,0.7)',
                    borderColor: 'rgba(0,123,255,1)',
                    borderWidth: 1
                },
                {
                    label: 'Selesai',
                    data: <?= json_encode($dataSelesai) ?>,
                    backgroundColor: 'rgba(40,167,69,0.7)',
                    borderColor: 'rgba(40,167,69,1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>