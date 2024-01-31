<?php 
// koneksi database
include 'koneksi.php';
 session_start();

// menangkap data yang di kirim dari form
$FotoID = $_POST['FotoID'];
$IsiKomentar = $_POST['IsiKomentar'];
$TanggalKomentar = date('Y-m-d');
$UserID = $_SESSION['UserID'];


// menginput data ke database
$sql=mysqli_query($koneksi,"insert into komentarfoto values('','$FotoID','$UserID','$IsiKomentar','$TanggalKomentar')");
 
// mengalihkan halaman kembali ke index.php
header("location:komentar.php?FotoID=".$FotoID);
 
?>