<?php
session_start();
include "koneksi.php";
$nama_kompetensi_keahlian= $_POST['nama_kompetensi_keahlian'];
$deskripsi_matkul= $_POST['deskripsi_matkul'];

$sql 		= "SELECT * FROM kompetensi_keahlian WHERE nama_kompetensi_keahlian = '$nama_kompetensi_keahlian' AND deskripsi_matkul = '$deskripsi_matkul'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "INSERT INTO kompetensi_keahlian(nama_kompetensi_keahlian, deskripsi_matkul) VALUES('$nama_kompetensi_keahlian','$deskripsi_matkul')";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
}
header("location:kompetensi-keahlian.php");
?>
