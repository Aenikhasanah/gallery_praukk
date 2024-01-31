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
    <h4>halaman Foto</h4>
    <p>Selamat datang <b><?=$_SESSION['NamaLengkap']?></b></p>

<hr>
<a href="tambah_foto.php" class="btn btn-info">Tambah</a>
    <table class="table table-striped table-bordered mt-3 ml-2">
        <tr class="fw-bold">
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi Foto</th>
            <th>Tanggal Unggah</th>
            <th>Foto</th>
            <th>Album</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $UserID=$_SESSION['UserID'];
        $sql=mysqli_query($koneksi,"select * from foto,album where foto.UserID='$UserID' and foto.AlbumID=album.AlbumID");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
            <td><?=$data['FotoID']?></td>
                <td><?=$data['JudulFoto']?></td>
                <td><?=$data['DeskripsiFoto']?></td>
                <td><?=$data['TanggalUnggah']?></td>
                <td>
                    <img src="gambar/<?=$data['LokasiFile']?>" width="150px">
                </td>
                <td><?=$data['NamaAlbum']?></td>
                <td>
                  <?php
                  $FotoID=$data['FotoID'];
                  $sql2=mysqli_query($koneksi,"SELECT * FROM likefoto WHERE FotoID='$FotoID'");
                  echo mysqli_num_rows($sql2);
                  ?>
                </td>
                <td>
                    <a href="edit_foto.php?FotoID=<?=$data['FotoID'] ?>" class='btn btn-primary'>Edit</a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data')" 
                    href="hapus_foto.php?FotoID=<?=$data['FotoID'] ?>" class='btn btn-danger'>Hapus</a>
            </tr>
      <?php  } ?>
    </table>
</body>
</html>