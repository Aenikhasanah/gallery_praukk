<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['UserID'])){
    //Untuk bisa like harus login dulu
    header("Location:index.php");
}else{
    $FotoID=$_GET['FotoID'];
    $UserID=$_SESSION['UserID'];
    // ceK apakah user sudah pernah like foto ini atau belum
    $sql=mysqli_query($koneksi,"select * from likefoto where FotoID='$FotoID' AND UserID='$UserID'");

    if(mysqli_num_rows($sql)==1){
        //user Sudah Pernah like foto ini
        header("Location:index.php");
    }else{
        $TanggalLike=date("Y-m-d");
        mysqli_query($koneksi,"insert into likefoto values ('','$FotoID','$UserID','$TanggalLike')");
        header("Location:index.php");
    }
}
?>