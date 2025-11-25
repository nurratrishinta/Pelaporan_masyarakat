<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Registrasi Akun - Aplikasi Pengaduan Masyarakat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            /* Background abu-abu kebiruan */
            background: linear-gradient(135deg, #dbeafe, #1e3a8a);
        }

        .register-container {
            max-width: 400px;
            margin: 80px auto;
            /* Card gradasi biru muda + biru tua */
            background: linear-gradient(160deg,rgb(34, 96, 196),rgb(160, 176, 221));
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            color: #fff;
            /* teks putih agar kontras */
        }

        h4 {
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: none;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(59, 130, 246, 0.8);
        }

        .btn-primary {
            background: linear-gradient(90deg, #1e3a8a, #2563eb);
            border: none;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #2563eb,rgb(76, 118, 233));
        }

        a {
            color:rgb(179, 209, 248);
            /* kuning biar kontras di biru */
        }

        a:hover {
            color:rgb(182, 165, 247);
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="register-container">
            <!-- Foto/logo di atas -->
            <img src="../../templates-admin/templates/src/assets/images/profile/Regi.jpg"
                alt="Logo Masyarakat"
                class="d-block mx-auto mb-4"
                style="width:110px; height:120px; object-fit:cover; border-radius:50%; border:3px solid #fff;">

            <h4 class="text-center mb-1">Registrasi Akun!</h4>
            <p class="text-center mb-4">Aplikasi Pengaduan Masyarakat</p>

            <form action="../../actions/auth/register.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="nik" class="form-control" placeholder="Masukan NIK" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="telp" class="form-control" placeholder="Masukan No Telpon" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>

                <div class="text-center mt-3">
                    <small>Sudah punya akun?
                        <a href="./login.php">Silahkan login!</a>
                    </small>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>