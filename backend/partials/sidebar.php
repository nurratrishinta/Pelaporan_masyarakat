<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // role bisa: admin | petugas | masyarakat
        $role = strtolower($_SESSION['role'] ?? '');

        // ambil file dan folder saat ini
        $current_file = basename($_SERVER['PHP_SELF']); // misal: index.php
        $current_dir  = basename(dirname($_SERVER['PHP_SELF'])); // misal: dashboard

        // helper fungsi untuk kasih class active
        function isActive($file, $dir = null)
        {
            global $current_file, $current_dir;
            if ($dir) {
                return ($current_file === $file && $current_dir === $dir) ? 'active' : '';
            }
            return ($current_file === $file) ? 'active' : '';
        }
        ?>

        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="../dashboard/index.php" class="text-nowrap d-flex align-items-center">
                        <img src="../../templates-admin/templates/src/assets/images/logos/log.png" width="40" alt="Logo" />
                        <span class="ms-2 fw-bold fs-4 text-dark">Pelaporan Masyarakat</span>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>

                <!-- Sidebar navigation -->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">

                        <?php if ($role === 'admin') : ?>
                            <!-- Dashboard hanya untuk admin -->
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= isActive('index.php', 'dashboard') ?>"
                                    href="../dashboard/index.php">
                                    <span><i class="ti ti-layout-dashboard"></i></span>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>

                            <!-- Menu Admin -->
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= isActive('verifikasi.php', 'pengaduan') ?>"
                                    href="../pengaduan/verifikasi.php" aria-expanded="false">
                                    <span><i class="ti ti-check"></i></span>
                                    <span class="hide-menu">Verifikasi & Validasi</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= isActive('index.php', 'tanggapan') ?>"
                                    href="../tanggapan/index.php" aria-expanded="false">
                                    <span><i class="ti ti-message"></i></span>
                                    <span class="hide-menu">Berikan Tanggapan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= isActive('index.php', 'laporan') ?>"
                                    href="../laporan/index.php" aria-expanded="false">
                                    <span><i class="ti ti-report"></i></span>
                                    <span class="hide-menu">Generate Laporan</span>
                                </a>
                            </li>

                        <?php elseif ($role === 'petugas') : ?>
                            <!-- Menu Petugas -->
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= isActive('verifikasi.php', 'pengaduan') ?>"
                                    href="../pengaduan/verifikasi.php" aria-expanded="false">
                                    <span><i class="ti ti-check"></i></span>
                                    <span class="hide-menu">Verifikasi & Validasi</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= isActive('index.php', 'tanggapan') ?>"
                                    href="../tanggapan/index.php" aria-expanded="false">
                                    <span><i class="ti ti-message"></i></span>
                                    <span class="hide-menu">Berikan Tanggapan</span>
                                </a>
                            </li>

                        <?php elseif ($role === 'masyarakat') : ?>
                            <!-- Menu Masyarakat -->
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= isActive('create.php', 'pengaduan') ?>"
                                    href="../pengaduan/create.php" aria-expanded="false">
                                    <span><i class="ti ti-file-description"></i></span>
                                    <span class="hide-menu">Tulis Pengaduan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= isActive('index.php', 'pengaduan') ?>"
                                    href="../pengaduan/index.php" aria-expanded="false">
                                    <span><i class="ti ti-cards"></i></span>
                                    <span class="hide-menu">Lihat Pengaduan</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Logout -->
                        <li class="sidebar-item">
                            <a class="sidebar-link text-danger" href="../../actions/auth/logout.php"
                                aria-expanded="false">
                                <span><i class="ti ti-logout"></i></span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->

            </div>
        </aside>
        <!-- Sidebar End -->