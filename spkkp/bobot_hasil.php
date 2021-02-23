<?php
	include('header.php');
?>

<br><br><br><br>
<section class="w3-content">
	<h5 class="">Matriks Perbandingan Berpasangan antar alternatif untuk kriteria 					<?php
						$nama = getNamak($id_kriteria);
						echo ucfirst($nama);
						 ?></h5>
	<table class="w3-table-all">
		<thead>
			<tr>
				<th>
					<?php
					$nama = getNamak($id_kriteria);
					echo ucfirst($nama);
					 ?>
				</th>
<?php
	for ($i=0; $i <= ($n-1); $i++) {
		echo "<th>".getAlternatifNama($i)."</th>";
	}
?>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) {
		echo "<tr>";
		echo "<td>".getAlternatifNama($x)."</td>";
			for ($y=0; $y <= ($n-1); $y++) {
				echo "<td>".round($matrik[$x][$y],3)."</td>";
			}

		echo "</tr>";
	}
?>
		</tbody>
		<tfoot>
			<tr>
				<th>Jumlah</th>
<?php
		for ($i=0; $i <= ($n-1); $i++) {
			echo "<th>".round($jmlmpb[$i],3)."</th>";
		}
?>
			</tr>
		</tfoot>
	</table>


	<br>

	<h3 class="">Matriks Nilai Kriteria</h3>
	<table class="w3-table-all">
		<thead>
			<tr>
				<th>Alternatif</th>
<?php
	for ($i=0; $i <= ($n-1); $i++) {
		echo "<th>".getAlternatifNama($i)."</th>";
	}
?>
				<th>Jumlah</th>
				<th>Priority Vector</th>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) {
		echo "<tr>";
		echo "<td>".getAlternatifNama($x)."</td>";
			for ($y=0; $y <= ($n-1); $y++) {
				echo "<td>".round($matrikb[$x][$y],3)."</td>";
			}

		echo "<td>".round($jmlmnk[$x],3)."</td>";
		echo "<td>".round($pv[$x],3)."</td>";

		echo "</tr>";
	}
?>

		</tbody>
		<tfoot>
			<tr>
				<th colspan="<?php echo ($n+2)?>">(λ maks)</th>
				<th><?php echo (round($eigenvektor,3))?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n+2)?>">Indeks Konsistensi</th>
				<th><?php echo (round($consIndex,3))?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n+2)?>">konsistensi Rasio</th>
				<th><?php echo (round(($consRatio * 100),2))?> %</th>
			</tr>
		</tfoot>
	</table>



<?php

	if ($consRatio > 0.1) {
?>
		<div class="w3-panel w3-pale-red">
			<div class="w3-content">
				<div class="header">
					Nilai Consistency Ratio melebihi 10% !!!
				</div>
				<p>Mohon input kembali tabel perbandingan...</p>
			</div>
		</div>

		<br>

		<a href='javascript:history.back()'>
			<button class="w3-button w3-red w3-round-small ">
				<i class="la la-arrow-left"></i>
				kembali
			</button>
		</a>

<?php

	} else {
		if ($jenis == getJumlahKriteria()) {
?>

<br>

<form action="hasil.php">
	<button class="w3-button w3-round-small w3-teal" style="float: right;">
		<i class="la la-arrow-right"></i>
	</button>
</form>


<?php

		} else {

?>
<br>
	<a href="<?php echo "bobot.php?c=".($jenis + 1)?>">
	<button class="w3-button w3-teal w3-round-small" style="float: right;">
		<i class="la la-arrow-right"></i>
	</button>
	</a>

<?php

		}
	}

	echo "</section>";

?>
<br>
<br>
<br>
<footer class="w3-buttom w3-white w3-card w3-padding-16 " style="  position: ;
left: 0;
  bottom: 0;
  width: 100%;"  >
	<p class="w3-center" > &copy; <?php echo date("Y"); ?> DUKCAPIL  <img src="images/logo.png" alt="company-logo" class="w3-bordered" width="35" height="45" ></p>
</footer>
