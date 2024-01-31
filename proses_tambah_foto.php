<?php 
// koneksi database
include 'koneksi.php';
 session_start();

// menangkap data yang di kirim dari form
$JudulFoto = $_POST['JudulFoto'];
$DeskripsiFoto = $_POST['DeskripsiFoto'];
$AlbumID = $_POST['AlbumID'];
$TanggalUnggah = date('Y-m-d');
$UserID = $_SESSION['UserID'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['LokasiFile']['name'];
$ukuran = $_FILES['LokasiFile']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:foto.php");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['LokasiFile']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "insert into foto values('','$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$xx','$AlbumID','$UserID')");
		header("location:foto.php");
	}else{
		header("location:foto.php");
	}
}


?>