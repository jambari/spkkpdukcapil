<?php
	include('config.php');
	include('fungsi.php');

	// mendapatkan data edit
	if(isset($_GET['jenis'])) {
		$jenis	= $_GET['jenis'];
	}




	if (isset($_POST['tambah'])) {
		$jenis	= $_POST['jenis'];

		if ($jenis == "kriteria") {
			$nama 	= $_POST['nama'];
			tambahKriteria($jenis,$nama);
			header('Location: '.$jenis.'.php');
		} else {
			$nama 	= $_POST['nama'];
			$cpns 	= $_POST['cpns'];
			$pns 	= $_POST['pns'];
			$golongan 	= $_POST['golongan'];
			tambahAlternatif($jenis,$nama,$cpns,$pns,$golongan);
			header('Location: '.$jenis.'.php');
		}
	}

	include('header.php');
?>
<br><br><br><br>
<section class="w3-content">

<?php

		if ($jenis=="kriteria") {
			print "<form class='w3-container w3-card' method='post' action='tambah.php'>";
			print "<p>";
			print "<label>Nama Kriteria </label>";
			print "<input class='w3-input' type='text' name='nama' required>";
			print "</p>";
			print "</p>";
			print "<input type='hidden' name='jenis' value='kriteria'>";
			print "<p>";
			print "<input class='w3-button w3-teal w3-round-small' type='submit' name='tambah' value='simpan'>";
			print "</p>";
			print "</form>";

		} else {
			print "<form class='w3-container w3-card' method='post' action='tambah.php'>";
			print "<p>";
			print "<label>Nama Pegawai </label>";
			print "<input class='w3-input' type='text' name='nama' required>";
			print "</p>";
			print "<p>";
			print "<label>TMT CPNS </label>";
			print "<input class='w3-input' type='date' name='cpns' required>";
			print "</p>";
			print "<p>";
			print "<label>TMT PNS </label>";
			print "<input class='w3-input' type='date' name='pns' required>";
			print "</p>";
			print "<p>";
			print "<select class='w3-select' name='golongan'>";
			print "<option value='' disabled selected>Pilih golongan</option>";
			echo "<option value='I'>I</option>";
			echo "<option value='II'>II</option>";
			echo "<option value='III'>III</option>";
			echo "<option value='IV'>IV</option>";
			echo "</select>";
			print "</p>";
			print "<p>";
			print "<input type='hidden' name='jenis' value='alternatif'>";
			print "<input class='w3-button w3-teal w3-round-small' type='submit' name='tambah' value='simpan'>";
			print "</form>";

		}
?>



</section>

<?php include('footer.php'); ?>
