<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
</head>
<body>
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
    <h3>Halaman Landing</h3>
    <?php
    session_start();
    if(empty($_SESSION['UserID'])){
        ?>
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
        <?php
    }else{
        ?>
  <p>Selamat Datang <b><?=$_SESSION['NamaLengkap']?></b></p>
        <?php
    }
    ?>

    <table width="99%" border="2" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>
    
        <?php
   include 'koneksi.php';
   $sql=mysqli_query($koneksi,"select * from foto,user where foto.UserID=user.UserID");
   while($data=mysqli_fetch_array($sql)){
       ?>
       <tr>
            <td><?=$data['FotoID']?></td>
            <td><?=$data['JudulFoto']?></td>
            <td><?=$data['DeskripsiFoto']?></td>
            <td><img src="gambar/<?=$data['LokasiFile']?>" width="100px"></td>
            <td><?=$data['NamaLengkap']?></td>
            <td>
                <?php
                    $FotoID=$data['FotoID'];
                    $sql2=mysqli_query($koneksi,"select * from likefoto where FotoID='$FotoID'");
                    echo mysqli_num_rows($sql2);
                ?>
            </td>
            <td>
                <a href="like.php?FotoID=<?=$data['FotoID']?>">Like</a>
                <a href="komentar.php?FotoID=<?=$data['FotoID']?>">Komentar</a>
            </td>
       </tr>
       <?php
   }
   ?>
    </table>
</body>
</html>