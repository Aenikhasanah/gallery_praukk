<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$Username = $_POST['Username'];
$Password =md5($_POST['Password']);
$Email = $_POST['Email'];
$NamaLengkap = $_POST['NamaLengkap'];
$Alamat = $_POST['Alamat'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into user values('','$Username','$Password','$Email','$NamaLengkap','$Alamat')");
 
// mengalihkan halaman kembali ke index.php
header("location:login.php");
 
?>