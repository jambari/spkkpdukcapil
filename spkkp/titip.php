// get singlenama kriteria
function getNamaKriteria($id_kriteria) {
	include('config.php');
	$query  = "SELECT nama FROM kriteria WHERE id=$id_kriteria";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama = $row['nama'];
	}

	return $nama;
}


<?php
$role = getRole($_SESSION["id"]);
if ($role=="admin") {
	echo "<a href='bobot_kriteria.php' class='w3-bar-item w3-button'>Bandingkan Kriteria</a>";
}
 ?>



 //get role
 	function getRole($role) {
 		include('config.php');
 		$query  = "SELECT id,role FROM users WHERE id=$role";
 		$result = mysqli_query($koneksi, $query);

 		while ($row = mysqli_fetch_array($result)) {
 			$roles= $row['role'];
 		}

 	return $roles;
 }


 $link = mysqli_connect($host, $username, $password, $database);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<div class="w3-dropdown-hover">
  <button class="w3-button">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?></button>
  <div class="w3-dropdown-content w3-bar-block w3-border">
    <!-- <a href="reset-password.php" class="w3-bar-item w3-button">Reset Password</a> -->
      <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
  </div>
</div>
