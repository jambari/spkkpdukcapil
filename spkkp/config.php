<?php
	// connection
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'arief';

	$koneksi = mysqli_connect($host,$username,$password);

	if (!$koneksi)
	{
		echo "Tidak dapat terkoneksi dengan server";
		exit();
	}

	if(!mysqli_select_db($koneksi, $database))
	{
		echo "Tidak dapat menemukan database";
		exit();
	}

	$link = mysqli_connect($host, $username, $password, $database);

 // Check connection
 if($link === false){
		 die("ERROR: Could not connect. " . mysqli_connect_error());
 }
?>
