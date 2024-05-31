<?php
session_start();
include "koneksi.php";
$kelas              = $_POST['kelas'];
$judul_materi       = $_POST['judul_materi'];
$deskripsi_materi   = $_POST['deskripsi_materi'];
$id_kompetensi      = $_POST['id_kompetensi'];

$sql = "SELECT * FROM kelas WHERE kelas = '$kelas' AND judul_materi = '$judul_materi' AND deskripsi_materi = '$deskripsi_materi' AND id_kompetensi = '$id_kompetensi'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "INSERT INTO kelas(kelas,judul_materi, deskripsi_materi, id_kompetensi) VALUES('$kelas','$judul_materi','$deskripsi_materi','$id_kompetensi')";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
}
header("location:kelas.php");
?>
