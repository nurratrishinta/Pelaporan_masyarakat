<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Aplikasi Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* Background ungu gelap + biru muda */
            background: linear-gradient(135deg, rgb(24, 20, 85), #3b82f6);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            /* Card gradasi putih + biru muda + ungu lembut */
            background: linear-gradient(160deg, rgb(62, 43, 230), rgb(219, 209, 235), rgb(120, 180, 236));
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
            border: none;
        }

        .card h4 {
            color: rgb(31, 31, 32);
            /* ungu medium */
            font-weight: 600;
        }

        .card p {
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solidrgb(1, 10, 20);
        }

        .form-control:focus {
            border-color: rgb(22, 22, 22);
            box-shadow: 0 0 6px rgba(43, 45, 145, 0.6);
        }

        .btn-primary {
            background: linear-gradient(90deg, rgb(86, 89, 240), rgb(22, 53, 104));
            border: none;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, rgb(177, 200, 238), rgb(56, 59, 243));
        }

        a {
            color: #4f46e5;
        }

        a:hover {
            text-decoration: underline;
            color: #3b82f6;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 360px;">
            <!-- Tambahkan gambar/logo -->
            <img src="../../templates-admin/templates/src/assets/images/profile/MM.png"
                alt="Masyarakat"
                class="d-block mx-auto mb-4"
                style="width:200px; height:150px; object-fit:cover; border-radius:8px;">

            <h4 class="text-center mb-3">Selamat Datang!</h4>
            <p class="text-center text-muted">Login</p>

            <form action="../../actions/auth/login.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Masukan username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Masukan password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <div class="text-center mt-3">
                <small>Belum punya akun?
                    <a href="./register.php">Silahkan daftar!</a>
                </small>
            </div>
            <div class="text-center mt-2">
                <a href="./login_petugas.php" class="text-decoration-none">Masuk sebagai Admin/Petugas</a>
            </div>
        </div>
    </div>
</body>

</html>