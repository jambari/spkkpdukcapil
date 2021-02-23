<?php
	include('config.php');
	include('fungsi.php');

	// mendapatkan data edit
	if(isset($_GET['jenis']) && isset($_GET['id'])) {
		$id 	= $_GET['id'];
		$jenis	= $_GET['jenis'];

		if ($jenis=="kriteria") {
			$query 	= "SELECT nama FROM $jenis WHERE id=$id";
			$result	= mysqli_query($koneksi, $query);

			while ($row = mysqli_fetch_array($result)) {
				$nama = $row['nama'];
			}
		} else {
			$query 	= "SELECT nama,cpns,pns,golongan FROM $jenis WHERE id=$id";
			$result	= mysqli_query($koneksi, $query);

			while ($row = mysqli_fetch_array($result)) {
				$nama = $row['nama'];
				$cpns = $row['cpns'];
				$pns = $row['pns'];
				$golongan = $row['golongan'];
			}
		}
		// hapus record
	}

	if (isset($_POST['update'])) {
		$id 	= $_POST['id'];
		$jenis	= $_POST['jenis'];
		$nama 	= $_POST['nama'];

		if ($jenis=="kriteria") {
			$query 	= "UPDATE $jenis SET nama='$nama' WHERE id=$id";
			$result	= mysqli_query($koneksi, $query);

			if (!$result) {
				echo "Update gagal";
				exit();
			} else {
				header('Location: '.$jenis.'.php');
				exit();

			}
			} else {
				$cpns = $_POST['cpns'];
				$pns = $_POST['pns'];
				$golongan = $_POST['golongan'];
				$query 	= "UPDATE $jenis SET nama='$nama',cpns='$cpns',pns='$pns',golongan='$golongan' WHERE id=$id";
				$result	= mysqli_query($koneksi, $query);

				if (!$result) {
					echo "Update gagal";
					exit();
				} else {
					header('Location: '.$jenis.'.php');
					exit();
				}
		}

	}

	include('header.php');
?>
<br><br><br><br>
<section class="w3-content">
	<?php

			if ($jenis=="kriteria") {
				print "<h3>Sunting ".$jenis."</h3>";
				print "<form class='w3-container w3-card' method='post' action='edit.php'>";
				print "<p>";
				print "<label>Nama Kriteria </label>";
				print "<input class='w3-input' type='text' name='nama' required value='".$nama."'>";
				print "</p>";
				print "<input class='w3-input' type='hidden' name='id' value='".$id."'>";
				print "</p>";
				print "</p>";
				print "<input type='hidden' name='jenis' value='kriteria'>";
				print "<p>";
				print "<input class='w3-button w3-teal w3-round-small' type='submit' name='update' value='update'>";
				print "</p>";
				print "</form>";

			} else {
				print "<form class='w3-container w3-card' method='post' action='edit.php'>";
				print "<p>";
				print "<label>Nama Pegawai </label>";
				print "<input class='w3-input' type='text' name='nama' required value='".$nama."'>";
				print "</p>";
				print "<p>";
				print "<label>TMT CPNS </label>";
				print "<input class='w3-input' type='date' name='cpns' required value='".$cpns."'>";
				print "</p>";
				print "<p>";
				print "<label>TMT PNS </label>";
				print "<input class='w3-input' type='date' name='pns' required value='".$pns."'>";
				print "</p>";
				print "<p>";
				print "<select class='w3-select' name='golongan'>";
				print "<option value='".$golongan."'selected>".$golongan."</option>";
				echo "<option value='I'>I</option>";
				echo "<option value='II'>II</option>";
				echo "<option value='III'>III</option>";
				echo "<option value='IV'>IV</option>";
				echo "</select>";
				print "</p>";
				print "<p>";
				print "<input type='hidden' name='jenis' value='alternatif'>";
				print "<input class='w3-input' type='hidden' name='id' value='".$id."'>";
				print "<input class='w3-button w3-teal w3-round-small' type='submit' name='update' value='update'>";
				print "</form>";

			}
	?>
</section>

<?php include('footer.php'); ?>
