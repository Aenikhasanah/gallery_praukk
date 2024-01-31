<?php 
// koneksi database
include 'koneksi.php';
 session_start();

// menangkap data yang di kirim dari form
$AlbumID = $_GET['AlbumID'];


// menginput data ke database
$sql=mysqli_query($koneksi,"delete from album where AlbumID='$AlbumID'");
 
// mengalihkan halaman kembali ke index.php
header("location:album.php");
 
?>