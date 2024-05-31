<?php
session_start();
include "koneksi.php";
$id_kelas 	          = $_POST['id_kelas'];
$kelas                = $_POST['kelas'];
$judul_materi         = $_POST['judul_materi'];
$deskripsi_materi     = $_POST['deskripsi_materi'];
$id_kompetensi        = $_POST['id_kompetensi'];

$sql 		= "SELECT * FROM kelas WHERE kelas ='$kelas' AND judul_materi = '$judul_materi' AND deskripsi_materi = '$deskripsi_materi' AND id_kompetensi = '$id_kompetensi'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Diupdate';
}else{
  $sql = "UPDATE kelas SET 
  kelas ='$kelas', 
  judul_materi ='$judul_materi',
  deskripsi_materi ='$deskripsi_materi',  
  id_kompetensi ='$id_kompetensi' 
WHERE id_kelas = '$id_kelas'";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Diupdate';
}
header("location:kelas.php");
?>
