</div> <!-- /wrapper -->

<footer class="w3-buttom w3-white w3-card w3-padding-5 " style="  position: fixed;
left: 0;
  bottom: 0;
  width: 100%;"  >
	<p class="w3-center" > &copy; <?php echo date("Y"); ?> DUKCAPIL  <img src="images/logo.png" alt="company-logo" class="w3-bordered" width="35" height="45" ></p>
</footer>

<script src="js/jquery-3.2.1.js"></script>
<script src="semantic/dist/semantic.min.js"></script>
<script type="text/javascript">
	$('.ui.radio.checkbox')
		.checkbox()
	;
</script>
<script type="text/javascript">
	$('.message .close')
	  .on('click', function() {
	    $(this)
	      .closest('.message')
	      .transition('fade')
	    ;
	  })
	;
</script>
</body>
</html>
