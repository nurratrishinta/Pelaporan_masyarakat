<!-- Main wrapper -->
<div class="body-wrapper">
    <!-- Header Start -->
    <header class="app-header">
        <nav class="navbar navbar-expand-lg shadow-sm custom-navbar">
            <!-- Toggle untuk sidebar mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Isi Navbar -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav flex-row align-items-center">
                    <!-- Tanggal + Jam -->
                    <li class="nav-item me-4 text-end">
                        <div class="fw-bold text-dark small" id="date"></div>
                        <div class="fw-bold text-dark small" id="clock"></div>
                    </li>

                    <!-- Foto Profile + Nama -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <div class="text-end me-2 text-dark">
                            <span class="fw-bold d-block fs-6">
                                <?= $_SESSION['username'] ?? 'Petugas' ?>
                            </span>
                        </div>
                        <a class="nav-link dropdown-toggle p-0 no-caret" href="#" id="drop2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="../../templates-admin/templates/src/assets/images/profile/icon.jpg"
                                alt="profile" width="36" height="36"
                                class="rounded-circle border border-primary">
                        </a>
                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="drop2">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="../../actions/auth/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Header End -->

    <div class="container-fluid py-4">
        <!-- isi konten disini -->
    </div>
</div>

<!-- Style khusus -->
<style>
    .custom-navbar {
        background: linear-gradient(90deg, #4facfe 0%, #ffffff 100%);
        height: 65px;
        /* tinggi navbar */
        padding: 0 20px;
    }

    .custom-navbar .nav-item .fw-bold {
        font-size: 14px;
        /* ukuran teks username */
    }

    .custom-navbar .nav-item small {
        font-size: 12px;
        /* ukuran role */
    }

    .custom-navbar img {
        width: 36px;
        height: 36px;
    }

    /* Hilangkan tanda panah (caret) pada dropdown */
    .navbar .dropdown-toggle::after {
        display: none !important;
    }
</style>