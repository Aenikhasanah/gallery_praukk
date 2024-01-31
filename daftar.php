<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi Gallery Foto</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <h4 class="text-center">Halaman Registrasi</h4>
            <div class="card">
                <div class="card-header">
                    <img src="gambar/student-login.png" width="50%"> 
                </div>
                <div class="card-body">
                    <form action="proses-register.php" method="post">
                        <div class="form-group-mb-2">
                            <label>Username</label>
                            <input type="text" name="Username" class="form-control">
                        </div>
                        <div class="form-group-mb-2">
                            <label>Password</label>
                            <input type="password" name="Password" class="form-control">
                        </div>
                        <div class="form-group-mb-2">
                            <label>Email</label>
                            <input type="text" name="Email" class="form-control">
                        </div>
                        <div class="form-group-mb-2">
                            <label>NamaLengkap</label>
                            <input type="text" name="NamaLengkap" class="form-control">
                        </div>
                        <div class="form-group-mb-2">
                            <label>Alamat</label>
                            <input type="text" name="Alamat" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
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