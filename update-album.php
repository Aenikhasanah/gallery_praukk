<?php 
// koneksi database
include 'koneksi.php';
 session_start();

// menangkap data yang di kirim dari form
$AlbumID = $_POST['AlbumID'];
$NamaAlbum = $_POST['NamaAlbum'];
$Deskripsi = $_POST['Deskripsi'];


// menginput data ke database
$sql=mysqli_query($koneksi,"update album set NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi' where AlbumID='$AlbumID'");
 
// mengalihkan halaman kembali ke index.php
header("location:album.php");
 
?>