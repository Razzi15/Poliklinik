<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Dokter - Sistem Temu Janji</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
            color: #495057;
        }

        .upper-bg {
            background-color: #3498db;
            padding: 40px 0;
            text-align: center;
        }

        .upper-bg h2 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #fff;
        }

        .lower-bg {
            padding: 20px;
        }

        .container {
            z-index: 1;
        }

        .row {
            margin-top: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
            border-bottom: none;
        }

        .card-body {
            padding: 20px;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #217dbb;
        }

        .icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .testimoni-card {
            margin-top: 20px;
        }

        .testimoni-card .card-header {
            background-color: #28a745;
        }

        .testimoni-card .card-header h5 {
            color: #fff;
        }

        .testimoni-card .card-body {
            background-color: #d4edda;
        }

        .testimoni-card .card-footer {
            background-color: #6EC982;
        }

        .testimoni-card .card-footer p {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="upper-bg">
        <div class="container">
            <div>
                <h2>Pesan Dokter</h2>
                <h2>Sistem Temu Janji</h2>
            </div>
        </div>
    </div>

    <div class="lower-bg">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Login sebagai Admin/Dokter</div>
                        <div class="card-body">
                            <p>
                                Jika Anda seorang Dokter/Admin, silakan login untuk memulai aktivitas Anda!
                            </p>
                            <button type="submit" class="btn btn-primary" onclick="redirectToAdminLogin()">
                                <i class="fas fa-user-md icon"></i> Login sebagai admin/dokter
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Login sebagai Pasien</div>
                        <div class="card-body">
                            <p>
                                Jika Anda adalah seorang Pasien, silakan login untuk melakukan pendaftaran Pasien!
                            </p>
                            <button type="submit" class="btn btn-primary" onclick="redirectToRegisterPasien()">
                                <i class="fas fa-user icon"></i> Login sebagai pasien
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimoni Card -->
            <div class="row justify-content-center testimoni-card">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header text-white">
                            <h5>Testimoni Pasien</h5>
                        </div>
                        <div class="card-body">
                            <p>"Pelayanan dokter sangat memuaskan. Saya merasa dipahami dan mendapatkan penanganan
                                yang baik."</p>
                        </div>
                        <div class="card-footer text-white">
                            <p>- Wahyudi</p>
                        </div>
                        <div class="card-body">
                            <p>"Pelayanan di web ini sangat mudah dan cepat. Detail history disusun secara lengkap.
                        </div>
                        <div class="card-footer text-white">
                            <p>- Wahyudi</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Testimoni Card -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function redirectToAdminLogin() {
            window.location.replace("admin/login");
        }

        function redirectToRegisterPasien() {
            window.location.replace("pasien");
        }
    </script>
</body>

</html>
