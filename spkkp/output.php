<?php
	include('header.php');

?>
<br><br><br><br>


<div class="w3-cell-row">

  <div class="w3-container  w3-cell">
		<h5 class="">Matriks Perbandingan Berpasangan</h5>
		<table class="w3-table-all">
			<thead>
				<tr>
					<th>Kriteria</th>
	<?php
		for ($i=0; $i <= ($n-1); $i++) {
			echo "<th>".getKriteriaNama($i)."</th>";
		}
	?>
				</tr>
			</thead>
			<tbody>
	<?php
		for ($x=0; $x <= ($n-1); $x++) {
			echo "<tr>";
			echo "<td>".getKriteriaNama($x)."</td>";
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

  </div>

  <div class="w3-container  w3-cell">
		<h5 class="">Matriks Nilai Kriteria </h5>
		<table class="w3-table-all">
			<thead>
				<tr>
					<th>Kriteria</th>
	<?php
		for ($i=0; $i <= ($n-1); $i++) {
			echo "<th>".getKriteriaNama($i)."</th>";
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
			echo "<td>".getKriteriaNama($x)."</td>";
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
					<th colspan="<?php echo ($n+2)?>">λ maks</th>
					<th><?php echo (round($eigenvektor,3))?></th>
				</tr>
				<tr>
					<th colspan="<?php echo ($n+2)?>">Indeks Konsistensi</th>
					<th><?php echo (round($consIndex,3))?></th>
				</tr>
				<tr>
					<th colspan="<?php echo ($n+2)?>">Konsistensi Rasio</th>
					<th><?php echo (round(($consRatio * 100),2))?> %</th>
				</tr>
			</tfoot>
		</table>

	<?php
		if ($consRatio > 0.1) {
	?>
			<div class="w3-panel w3-red w3-border">
				<i class="la la-danger"></i>
				<div class="w3-content">
					<div class="header">
						Nilai Konsistensi Rasio 10% !!!
					</div>
					<p>Mohon input kembali tabel perbandingan...</p>
				</div>
			</div>
			<a href='javascript:history.back()'>
				<button class="w3-button w3-round-small w3-red">
					<i class="la la-arrow-left"></i>
					kembali
				</button>
			</a>

	<?php
		} else {

	?>
	<br>
	<a class="w3-button w3-round-small w3-border w3-teal" href="bobot.php?c=1">
				<i class="la la-arrow-right"></i>
			</a>
  </div>

</div>

<?php
	}
	include('footer.php');
?>
