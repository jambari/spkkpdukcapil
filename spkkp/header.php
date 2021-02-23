
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SPK-KP DUKCAPIL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="la/css/line-awesome.min.css">
	<style>
	body {font-family: "Times New Roman", Georgia, Serif;}
	h1, h2, h3, h4, h5, h6 {
	  font-family: "Playfair Display";
	  letter-spacing: 5px;
	}
	</style>
</head>

<body>
	<!-- Navbar (sit on top) -->
	<div class="w3-top">
	  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">

	    <a href="/" class="w3-bar-item w3-button"> SPK-KP DUKCAPIL</a>
			<img src="images/logo.png" alt="company-logo" class="w3-bordered w3-left-align " width="35" height="45" >
	    <!-- Right-sided navbar links. Hide them on small screens -->
	    <div class="w3-right w3-hide-small">
	      <a href="kriteria.php" class="w3-bar-item w3-button">Kriteria</a>
	      <a href="alternatif.php" class="w3-bar-item w3-button">Pegawai</a>
<!-- <a href='bobot_kriteria.php' class='w3-bar-item w3-button'>Bandingkan Kriteria</a> -->
<?php
$role = getRole($_SESSION["id"]);
if ($role=="admin") {
	echo "<a href='bobot_kriteria.php' class='w3-bar-item w3-button'>Bandingkan Kriteria</a>";
	echo "<div class='w3-dropdown-hover'>";
	echo "<button class='w3-button'>Bandingkan Pegawai</button>";
	echo "<div class='w3-dropdown-content w3-bar-block w3-border'>";

					if (getJumlahKriteria() > 0) {
						for ($i=0; $i <= (getJumlahKriteria()-1); $i++) {
							echo "<a class='w3-bar-item w3-button' href='bobot.php?c=".($i+1)."' >".getKriteriaNama($i)."</a>";
						}
					}
		echo "</div>";
 echo "</div>";



}
 ?>


						<a href="hasil.php" class="w3-bar-item w3-button">Laporan</a>
            <a href="arsip.php" class="w3-bar-item w3-button">Arsip</a>
						<div class="w3-dropdown-hover">
						  <button class="w3-button">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?></button>
						  <div class="w3-dropdown-content w3-bar-block w3-border">
						    <!-- <a href="reset-password.php" class="w3-bar-item w3-button">Reset Password</a> -->
						      <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
						  </div>
						</div>

	    </div>

	  </div>
	</div>
