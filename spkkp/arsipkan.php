<?php
	include('config.php');
	include('fungsi.php');

	// menjalankan perintah delete
  if(isset($_POST['submit'])) {
    $tahun = $_POST['tahun'];
    $query  = "SELECT id_alternatif,nilai FROM ranking";
    $result = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_array($result)) {
      $id_alternatif = $row['id_alternatif'];
      $nilai = $row['nilai'];
      $sql = " INSERT INTO arsip (id_alternatif,nilai,tahun) VALUES ($id_alternatif, $nilai, $tahun) ";
      $koneksi->query($sql);
    }
    header("Location: arsip.php");
  }



	//include('header.php');

?>
