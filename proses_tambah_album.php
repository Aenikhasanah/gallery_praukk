<?php 
// koneksi database
include 'koneksi.php';
 session_start();

// menangkap data yang di kirim dari form
$NamaAlbum = $_POST['NamaAlbum'];
$Deskripsi = $_POST['Deskripsi'];
$TanggalDibuat = date('Y-m-d');
$UserID = $_SESSION['UserID'];


// menginput data ke database
$sql=mysqli_query($koneksi,"insert into album values('','$NamaAlbum','$Deskripsi','$TanggalDibuat','$UserID')");
 
// mengalihkan halaman kembali ke index.php
header("location:album.php");
 
?>