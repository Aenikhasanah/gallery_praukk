<?php 
// koneksi database
include 'koneksi.php';
 session_start();

// menangkap data yang di kirim dari form
$FotoID = $_GET['FotoID'];


// menginput data ke database
$sql=mysqli_query($koneksi,"delete from foto where FotoID='$FotoID'");
 
// mengalihkan halaman kembali ke index.php
header("location:foto.php");
 
?>