<?php
//1. bikin koneksi
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","the_griffin_coffee_shop");
	$koneksi=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//test koneksi 
	if(mysqli_connect_errno()){
		die("Gagal koneksi database"
		.mysqli_connect_error().
		"(".mysqli_connect_errno().")"
		); 
	}
?>