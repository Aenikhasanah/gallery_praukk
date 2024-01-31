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
    <h4>Halaman Tambah Foto</h4>
    <p>Selamat datang <b><?=$_SESSION['NamaLengkap']?></b></p>

<hr>
<form action="proses_tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="JudulFoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="DeskripsiFoto"></td>
            </tr>
            <tr>
               <td>Lokasi File</td>
               <td><input type="file" name="LokasiFile"></td>
           </tr>
           <tr>
               <td>Album</td>
               <td>
                <select name="AlbumID">
                <?php
               include 'koneksi.php';
               $UserID= $_SESSION['UserID'];
               $sql=mysqli_query($koneksi,"select * from album where UserID='$UserID'");
               while($data=mysqli_fetch_array($sql)){
               ?>
               <option value="<?=$data['AlbumID']?>"><?=$data['NamaAlbum']?></option>
                <?php
               }
                ?>
                </select>
               </td>
           </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
</body>
</html>



















