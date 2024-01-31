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
    <h4>Halaman Komentar</h4>
    <p>Selamat datang <b><?=$_SESSION['NamaLengkap']?></b></p>

<hr>
<form action="tambah_komentar.php" method="post">
        <?php
        include 'koneksi.php';
        $FotoID=$_GET['FotoID'];
        $sql=mysqli_query($koneksi,"select * from foto where FotoID='$FotoID'");
        while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="FotoID" value="<?=$data['FotoID']?>" hidden> 
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="JudulFoto" value="<?=$data['JudulFoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="DeskripsiFoto" value="<?=$data['DeskripsiFoto']?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><img src="gambar/<?=$data['LokasiFile']?>" width=""150px ></td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><input type="text" name="IsiKomentar"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
    
        </table>
        <?php
        }
        ?>
        <table width="95%" border="1" cellpading="5" cellspacing="0" >
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
        <?php
        include 'koneksi.php';
        $UserID=$_SESSION['UserID'];
        $sql=mysqli_query($koneksi,"select * from komentarfoto,user where komentarfoto.UserID='$UserID' and  user.UserID='$UserID' ");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?=$data['KomentarID']?></td>
                <td><?=$data['NamaLengkap']?></td>
                <td><?=$data['IsiKomentar']?></td>
                <td><?=$data['TanggalKomentar']?></td>
            </tr>
        <?php
        }
        ?>
        </table>
    </form>
        </body>
        </html>