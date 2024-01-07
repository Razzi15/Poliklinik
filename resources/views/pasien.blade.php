<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>Daftar Pasien</title>
  <style>
    body {
      background-color: #3498db; /* Warna biru sebagai background */
      color: #fff; /* Warna teks putih */
    }
    .container {
      margin-top: 50px;
    }
    /* Gaya untuk mengubah warna label menjadi hitam */
    label {
      color: #000;
    }
    /* Gaya untuk menambahkan warna merah pada bintang */
    .required {
      color: red;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h2 class="mb-0">Daftar Pasien</h2>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="fullname">Nama Lengkap<span class="required">*</span></label>
            <input type="text" class="form-control" id="fullname" placeholder="Masukkan Nama Lengkap">
          </div>
          <div class="form-group">
            <label for="nik">Nomor Induk Keluarga<span class="required">*</span></label>
            <input type="text" class="form-control" id="nik" placeholder="Masukkan Nomor Induk Keluarga">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat<span class="required">*</span></label>
            <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat">
          </div>
          <div class="form-group">
            <label for="phone">No Handphone<span class="required">*</span></label>
            <input type="text" class="form-control" id="phone" placeholder="Masukkan Nomor Handphone">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
<script>
    $(document).ready(function () {
        var alertMessage = "{{ session('alert') }}";

        if (alertMessage) {
            alert(alertMessage);
        }
    });
</script>
</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pasien</title>
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

        .container {
            z-index: 1;
        }

        .bg-light {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            background-color: #fff; /* White background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
            transition: box-shadow 0.3s;
            border-radius: 0; /* No rounded corners, making it a rectangle */
        }

        .card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Slightly increased shadow on hover */
        }

        .card-header {
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
            text-align: center;
            padding: 15px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border: none;
            border-radius: 8px;
            padding: 15px;
            background-color: #f0f0f0; /* Light gray background */
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1); /* Inset shadow for depth */
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
            width: 100%;
            padding: 15px;
            border-radius: 0;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #217dbb;
        }

        .have-account {
            text-align: center;
            margin-top: 15px;
        }

        .have-account a {
            color: #3498db;
            text-decoration: none;
        }

        .have-account a:hover {
            text-decoration: underline;
        }
            /* Gaya untuk menambahkan warna merah pada bintang */
        .required {
            color: red;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <h2 class="nk-block-title fw-normal">
                Pesan Dokter
            </h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Register a new account</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                            <label for="nik">Nama Lengkap<span class="required">*</span></label>
                                <input placeholder="Nama lengkap" class="form-control" type="text"
                                    name="fullname" id="fullname" required>
                            </div>
                            <div class="form-group">
                            <label for="nik">Nomor Induk Keluarga<span class="required">*</span></label>
                                <input placeholder="NIK" class="form-control" type="text" name="nik" id="nik"
                                    required>
                            </div>
                            <div class="form-group">
                            <label for="nik">Alamat Lengkap<span class="required">*</span></label>
                                <input placeholder="Alamat" class="form-control" type="text" name="alamat"
                                    id="alamat" required>
                            </div>
                            <div class="form-group">
                            <label for="nik">Nomor Handphone<span class="required">*</span></label>
                                <input placeholder="Nomer Hp" class="form-control" type="text" name="phone"
                                    id="phone" required>
                            </div>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                        <div class="have-account">
                            <a href="loginpasien">I have already have an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<script>
    $(document).ready(function () {
        var alertMessage = "{{ session('alert') }}";

        if (alertMessage) {
            alert(alertMessage);
        }
    });
</script>

</html>


</html>
