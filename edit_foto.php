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
    <h4>halaman home</h4>
    <p>Selamat datang <b><?=$_SESSION['NamaLengkap']?></b></p>

<hr>
<form action="update-foto.php?ID=<?=$_GET['FotoID'] ?>" method="post" enctype="multipart/form-data">
        <?php
        include'koneksi.php';
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
               <td>Lokasi File</td>
               <td><input type="file" name="LokasiFile" ></td>
           </tr>
           <tr>
              <td>Album</td>
              <td>
               <select name="AlbumID">
               <?php
              $UserID= $_SESSION['UserID'];
              $sql2=mysqli_query($koneksi,"select * from album where UserID='$UserID'");
              while($data2=mysqli_fetch_array($sql2)){
              ?>
              <option value="<?=$data2['AlbumID']?>" <?php if($data2['AlbumID']==$data['AlbumID']){echo 'selected';}?>>
              <?=$data2['NamaAlbum']?></option>
               <?php
              }
               ?>
               </select>
              </td>
          </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
        </body>
        </html>