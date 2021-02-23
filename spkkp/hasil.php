<?php

include('config.php');
include('fungsi.php');


// menghitung perangkingan
$jmlKriteria 	= getJumlahKriteria();
$jmlAlternatif	= getJumlahAlternatif();
$nilai			= array();

// mendapatkan nilai tiap alternatif
for ($x=0; $x <= ($jmlAlternatif-1); $x++) {
	// inisialisasi
	$nilai[$x] = 0;

	for ($y=0; $y <= ($jmlKriteria-1); $y++) {
		$id_alternatif 	= getAlternatifID($x);
		$id_kriteria	= getKriteriaID($y);

		$pv_alternatif	= getAlternatifPV($id_alternatif,$id_kriteria);
		$pv_kriteria	= getKriteriaPV($id_kriteria);

		$nilai[$x]	 	+= ($pv_alternatif * $pv_kriteria);
	}
}

// update nilai ranking
for ($i=0; $i <= ($jmlAlternatif-1); $i++) {
	$id_alternatif = getAlternatifID($i);
	$query = "INSERT INTO ranking VALUES ($id_alternatif,$nilai[$i]) ON DUPLICATE KEY UPDATE nilai=$nilai[$i]";
	$result = mysqli_query($koneksi,$query);
	if (!$result) {
		echo "Gagal mengupdate ranking";
		exit();
	}
}

include('header.php');

?>
<br><br><br><br>
<section class="w3-content">
	<h3 class="">Hasil Perhitungan</h3>
	<table class="w3-table-all">
		<thead>
		<tr>
			<th>Kriteria</th>
			<th>Rata-rata kriteria</th>
			<?php
			for ($i=0; $i <= (getJumlahAlternatif()-1); $i++) {
				echo "<th>".getAlternatifNama($i)."</th>\n";
			}
			?>
		</tr>
		</thead>
		<tbody>

		<?php
			for ($x=0; $x <= (getJumlahKriteria()-1) ; $x++) {
				echo "<tr>";
				echo "<td>".getKriteriaNama($x)."</td>";
				echo "<td>".round(getKriteriaPV(getKriteriaID($x)),3)."</td>";

				for ($y=0; $y <= (getJumlahAlternatif()-1); $y++) {
					echo "<td>".round(getAlternatifPV(getAlternatifID($y),getKriteriaID($x)),3)."</td>";
				}


				echo "</tr>";
			}
		?>
		</tbody>

		<tfoot>
		<tr>
			<th colspan="2">Total</th>
			<?php
			for ($i=0; $i <= ($jmlAlternatif-1); $i++) {
				echo "<th>".round($nilai[$i],3)."</th>";
			}
			?>
		</tr>
		</tfoot>

	</table>


	<h3 class="w3-center">Rangking</h3>
	<table class="w3-table-all">
		<thead>
			<tr>
				<th>Peringkat</th>
				<th>Pegawai</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query  = "SELECT id,nama,id_alternatif,nilai FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif ORDER BY nilai DESC";
				$result = mysqli_query($koneksi, $query);

				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
					$i++;
				?>
				<tr>
					<?php if ($i == 1) {
						echo "<td class='w3-teal'>Pertama</div></td>";
					} else {
						echo "<td>".$i."</td>";
					}

					?>

					<td <?php if ($i == 1) {
						echo "class='w3-teal'";
					} else {
						echo "";
					} ?> ><?php echo $row['nama'] ?></td>
					<td <?php if ($i == 1) {
						echo "class='w3-teal'";
					} else {
						echo "";
					} ?> ><?php echo round($row['nilai'],3) ?></td>
				</tr>

				<?php
				}
			?>
		</tbody>
	</table>
	<br>

<?php

	$role = getRole($_SESSION['id']);
	if ($role=='kadin') {
?>
<form class="w3-container w3-card" action="arsipkan.php" method="post">
	<p>
		<label for="tahun">Tahun</label>
		<input class="w3-input" type="number" name="tahun" value="" placeholder="Tahun Persetujuan dan pengarsipan" >
	</p>
	<p>
		<button class="w3-button w3-block w3-round-small w3-orange " type="submit" name="submit">Setujui dan Arsipkan</button>
	</p>

</form>
<?php
	}

 ?>


</section>

<br>

<footer class="w3-buttom w3-white w3-card w3-padding-16 " style="  position: ;
left: 0;
  bottom: 0;
  width: 100%;"  >
	<p class="w3-center" > &copy; <?php echo date("Y"); ?> DUKCAPIL  <img src="images/logo.png" alt="company-logo" class="w3-bordered" width="35" height="45" ></p>
</footer>
