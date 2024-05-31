<?php
	$koneksi = mysqli_connect("localhost","root","","db_spp2");
	if(!$koneksi){
		echo "<h1 align='center'>Database tidak terhubung!</h1>";	
		exit();
	}


?>