<?php 
// koneksi database
include 'koneksi.php';
 session_start();

// menangkap data yang di kirim dari form
$JudulFoto = $_POST['JudulFoto'];
$DeskripsiFoto = $_POST['DeskripsiFoto'];
$AlbumID = $_POST['AlbumID'];
$ID = $_GET['ID'];

// jika Upload gambar baru
if ($_FILES['LokasiFile']['name'] != ""){
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
		mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$JudulFoto', 
		DeskripsiFoto='$DeskripsiFoto', LokasiFile='$xx', AlbumID='$AlbumID' WHERE FotoID='$ID'");
		header("location:foto.php");
	}else{
		header("location:foto.php");
	}
}

}else{
    mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', AlbumID='$AlbumID' WHERE FotoID='$ID'");
    header("location:foto.php");
}

 
?>