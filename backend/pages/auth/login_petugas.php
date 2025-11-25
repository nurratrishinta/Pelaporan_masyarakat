<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin/Petugas</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            /* Background biru gradasi */
            background: linear-gradient(135deg, rgb(47, 66, 99), rgb(76, 117, 192));
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-box {
            /* Card gradasi: biru muda + putih + biru tua */
            background: linear-gradient(160deg, rgb(101, 158, 233), rgb(202, 204, 240) 40%, rgb(9, 30, 68) 95%);
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-box h4 {
            font-weight: 600;
            margin-bottom: 10px;
            color: #1e3c72;
        }

        .login-box p {
            color: #333;
            margin-bottom: 25px;
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid rgb(149, 190, 241);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            font-weight: 500;
            border-radius: 8px;
            background: linear-gradient(90deg, #1e3c72, #3b82f6);
            border: none;
            color: #fff;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: linear-gradient(90deg, #3b82f6, rgb(229, 231, 235));
        }

        .login-link {
            display: block;
            margin-top: 15px;
            font-size: 0.9rem;
            color: rgb(224, 231, 243);
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
            color: #2563eb;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <!-- Tambahkan gambar/logo -->
        <img src="../../templates-admin/templates/src/assets/images/profile/Aa.jpg"
            alt="Logo Admin/Petugas"
            class="mb-4 d-block mx-auto"
            style="width:155px; height:155px; object-fit:cover; border-radius:50%;">

        <h4>Selamat Datang Admin/Petugas!</h4>
        <p>Aplikasi Pengaduan Masyarakat</p>
        <form action="../../pages/pengaduan/verifikasi.php" method="post">
            
            <div class="mb-3 text-start">
                <input type="text" name="username" class="form-control" placeholder="Masukan username" required>
            </div>
            <div class="mb-3 text-start">
                <input type="password" name="password" class="form-control" placeholder="Masukan password" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>

        <a href="login.php" class="login-link">Masuk sebagai Masyarakat</a>
    </div>

</body>

</html>