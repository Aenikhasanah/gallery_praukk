<?php
session_start();
if (!isset($_SESSION['UserID'])){
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="foto.php">Foto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</head>
<body>
    <h4>Halaman Album</h4>
    <p>Selamat datang <b><?=$_SESSION['NamaLengkap']?></b></p>

<hr>
<a href="tambah_album.php" class="btn btn-info">Tambah</a>
    <table class="table table-striped table-bordered mt-3 ml-2">
        <tr class="fw-bold">
            <td>No</td>
            <td>Nama Album</td>
            <td>Deskripsi</td>
            <td>Tanggal Dibuat</td>
            <td>Aksi</td>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $sql = "SELECT * FROM album ORDER BY AlbumID DESC";
        $query = mysqli_query($koneksi, $sql);
        foreach($query as $data){ ?> 
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['NamaAlbum'] ?></td>
                <td><?= $data['Deskripsi'] ?></td>
                <td><?= $data['TanggalDibuat'] ?></td>
                <td>
                    <a href="edit_album.php?AlbumID=<?=$data['AlbumID'] ?>" class='btn btn-primary'>Edit</a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data')" 
                    href="hapus_album.php?AlbumID=<?=$data['AlbumID'] ?>" class='btn btn-danger'>Hapus</a>
            </tr>
      <?php  } ?>
    </table>
</body>
</html>