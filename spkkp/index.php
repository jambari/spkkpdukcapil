
<?php
include('config.php');
include('fungsi.php');

// header
include('header.php');
?>
<br><br><br><br>
	<section class="w3-content">
			<h3 class="">Selamat datang di Sistem Pendukung Keputusan Kenaikan Pangkat</h3>

			<h2 class="w3-center w3-text-teal w3-card " >SPK KP DUKCAPIL</h2>

			<p class="w3-justify" >Sistem ini digunakan untuk pemeringkatan pegawai di lingkungan DUKCAPIL  <a class="w3-text-blue" href="http://dukcapil.jayapurakota.go.id/" style="text-decoration: none;" target="_blank">Kab. Jayapura</a>  berdasarkan metode AHP. Analytic Hierarchy Process (AHP) merupakan suatu model pendukung keputusan yang dikembangkan oleh Thomas L. Saaty. Model pendukung keputusan ini akan menguraikan masalah multi faktor atau multi kriteria yang kompleks menjadi suatu hirarki. Hirarki  didefinisikan sebagai suatu representasi dari sebuah permasalahan yang kompleks dalam suatu struktur multi level dimana level pertama adalah tujuan, yang diikuti level faktor, kriteria, sub kriteria, dan seterusnya ke bawah hingga level terakhir dari alternatif. Pada <strong class="w3-center w3-text-teal">SPK KP DUKCAPIL</strong> kriteria yang dipilih adalah Sasaran Knerja Pegawai (SKP), Perilaku, dan Golongan. </p>

			<p class="w3-justify">AHP membantu para pengambil keputusan untuk memperoleh solusi terbaik dengan mendekomposisi permasalahan kompleks ke dalam bentuk yang lebih sederhana untuk kemudian melakukan sintesis terhadap berbagai faktor yang terlibat dalam permasalahan pengambilan keputusan tersebut. AHP mempertimbangkan aspek kualitatif dan kuantitatif dari suatu keputusan dan mengurangi kompleksitas suatu keputusan dengan membuat perbandingan satu-satu dari berbagai kriteria yang dipilih untuk kemudian mengolah dan memperoleh hasilnya.</p>

			<p class="w3-justify">AHP sering digunakan sebagai metode pemecahan masalah dibanding dengan metode yang lain karena alasan-alasan sebagai berikut :</p>

			<ol class="ui list">
				<li>Struktur yang berhirarki, sebagai konsekuesi dari kriteria yang  dipilih, sampai pada subkriteria yang paling dalam.</li>
				<li>Memperhitungkan validitas sampai dengan batas toleransi inkonsistensi berbagai kriteria dan alternatif yang dipilih oleh pengambil keputusan.</li>
				<li>Memperhitungkan daya tahan output analisis sensitivitas pengambilan keputusan.</li>
			</ol>

			<br>

			<h3 class="">Tabel Tingkat Kepentingan menurut Saaty (1980)</h3>
			<table class="w3-table-all">
				<thead  >
					<tr class="w3-amber">
						<th>Nilai Numerik</th>
						<th>Tingkat Kepentingan <em>(Preference)</em></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center aligned">1</td>
						<td>Sama pentingnya <em>(Equal Importance)</em></td>
					</tr>
					<tr>
						<td class="center aligned">2</td>
						<td>Sama hingga sedikit lebih penting</td>
					</tr>
					<tr>
						<td class="center aligned">3</td>
						<td>Sedikit lebih penting <em>(Slightly more importance)</em></td>
					</tr>
					<tr>
						<td class="center aligned">4</td>
						<td>Sedikit lebih hingga jelas lebih penting</td>
					</tr>
					<tr>
						<td class="center aligned">5</td>
						<td>Jelas lebih penting <em>(Materially more importance)</em></td>
					</tr>
					<tr>
						<td class="center aligned">6</td>
						<td>Jelas hingga sangat jelas lebih penting</td>
					</tr>
					<tr>
						<td class="center aligned">7</td>
						<td>Sangat jelas lebih penting <em>(Significantly more importance)</em></td>
					</tr>
					<tr>
						<td class="center aligned">8</td>
						<td>Sangat jelas hingga mutlak lebih penting</td>
					</tr>
					<tr>
						<td class="center aligned">9</td>
						<td>Mutlak lebih penting <em>(Absolutely more importance)</em></td>
					</tr>
				</tbody>
			</table>

	</section>
	<br>
	<footer class="w3-buttom w3-white w3-card w3-padding-16 " style="  position: ;
	left: 0;
	  bottom: 0;
	  width: 100%;"  >
		<p class="w3-center" > &copy; <?php echo date("Y"); ?> DUKCAPIL  <img src="images/logo.png" alt="company-logo" class="w3-bordered" width="35" height="45" ></p>
	</footer>
