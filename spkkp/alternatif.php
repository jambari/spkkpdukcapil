<?php
	include('config.php');
	include('fungsi.php');

	// menjalankan perintah edit
	if(isset($_POST['edit'])) {
		$id = $_POST['id'];

		header('Location: edit.php?jenis=alternatif&id='.$id);
		exit();
	}

	// menjalankan perintah delete
	if(isset($_POST['delete'])) {
		$id = $_POST['id'];
		deleteAlternatif($id);
	}

	// menjalankan perintah tambah
	if(isset($_POST['tambah'])) {
		$nama = $_POST['nama'];
		tambahData('alternatif',$nama);
	}

	include('header.php');

?>

<br><br><br><br>
<section class="w3-content">

	<h5 class=""><a href="tambah.php?jenis=alternatif"  class="w3-button w3-round-small w3-teal"> <i class="la la-plus-circle"></i> </a> Pegawai</h5>

	<table class="w3-table w3-border w3-bordered w3-hovered w3-centered">
		<thead>
			<tr>
				<th class="collapsing">No</th>
				<th >Pegawai</th>
				<th>TMT CPNS</th>
				<th>TMT PNS</th>
				<th>Golongan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>

		<?php
			// Menampilkan list alternatif
			$query = "SELECT * FROM alternatif ORDER BY id";
			$result	= mysqli_query($koneksi, $query);

			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$i++;
		?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo ucfirst($row['nama']) ?></td>
				<td><?php echo $row['cpns'] ?></td>
				<td><?php echo $row['pns'] ?></td>
				<td><?php echo $row['golongan'] ?></td>
				<td class="right aligned collapsing">
					<form method="post" action="alternatif.php">
						<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
						<?php
						$role = getRole($_SESSION['id']);
						if ($role=='admin') {
							echo "<button type='submi' name='edit' class='w3-button w3-white w3-border w3-round w3-border-orange'><i class='la la-pencil'></i></button>";
							echo "<span> </span>";
							echo "<button type='submit' name='delete' class='w3-button w3-white w3-border w3-round w3-border-red '><i class='la la-trash'></i></button>";
						}

						 ?>
					</form>
				</td>
			</tr>

<?php } ?>

		</tbody>
	</table>

	<br>


	<form action="bobot_kriteria.php">
	<button class="w3-button w3-rounded w3-border w3-teal" style="float: right;">
		<i class="la la-arrow-right" ></i>
	</button>
	</form>
</section>

<?php include('footer.php'); ?>
