<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Aplikasi Gallery Foto</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <h4 class="text-center">Halaman Login</h4>
            <div class="card">
                <div class="card-header">
                    <img src="gambar/login.png" width="50%"> 
                </div>
                <div class="card-body">
                    <form action="proses_login.php" method="post">
                        <div class="form-group-mb-2">
                            <label>username</label>
                            <input type="text" name="Username" class="form-control" placeholder="Masukkan username anda.." required>
                        </div>
                        <div class="form-group-mb-2">
                            <label>password</label>
                            <input type="password" name="Password" class="form-control" placeholder="Masukkan password anda.." required>
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                            </div>
                            <div class="form-group mt-3">
                                <label >Belum Punya Akun? klik tombol berikut</label>
                            <a href="daftar.php" class=" btn btn-warning btn-sm">Daftar Akun</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>