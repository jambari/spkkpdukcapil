<?php
	include('config.php');
  include('fungsi.php');

	$jenis = $_GET['c'];

	include('header.php');
?>
<br>
<br>
<br>
<br>
<section class="w3-content ">
	<h5 class="">Perbandingan Pegawai &rarr; <?php echo getKriteriaNama($jenis-1) ?></h5>
	<?php showTabelPerbandingan($jenis,'alternatif'); ?>
</section>

<br><br><br><br><br><br><br>

<footer class="w3-buttom w3-white w3-card w3-padding-16 " style="  position: ;
left: 0;
  bottom: 0;
  width: 100%;"  >
	<p class="w3-center" > &copy; <?php echo date("Y"); ?> DUKCAPIL  <img src="images/logo.png" alt="company-logo" class="w3-bordered" width="35" height="45" ></p>
</footer>
