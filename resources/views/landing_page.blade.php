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
            height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Arial', sans-serif;
        }

        .upper-bg {
            flex: 1;
            background-color: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }

        .upper-bg h2 {
            font-size: 2em;
            margin-bottom: 0.5em;
        }

        .lower-bg {
            flex: 3;
            background-color: #f8f9fa;
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
        }

        .card-body {
            padding: 20px;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
        }

        .btn-primary:hover {
            background-color: #217dbb;
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
                                Apabila anda seorang Dokter/Admin, silahkan Login terlebih dahulu untuk memulai
                                aktivitas
                                anda!
                            </p>
                            <button type="submit" class="btn btn-primary" onclick="redirectToAdminLogin()">
                                <i class="fas fa-user-md"></i> Login sebagai admin/dokter
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Login sebagai Pasien</div>
                        <div class="card-body">
                            <p>
                                Apabila anda adalah seorang Pasien, silahkan login terlebih dahulu untuk melakukan
                                pendaftaran Pasien!
                            </p>
                            <button type="submit" class="btn btn-primary" onclick="redirectToPasien()">
                                <i class="fas fa-user"></i> Login sebagai pasien
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function redirectToAdminLogin() {
            window.location.replace("admin/login");
        }

        function redirectToPasien() {
            window.location.replace("pasien");
        }
    </script>
</body>

</html>
