<div class="row">
	<div class="large-12 columns">
		<hr/>
		<div class="row">
		<div class="right">
			 	<?php if (!isset($_SESSION[$ida . "operater"])){ ?>
    <a class="tiny secondary round button prijava" href="<?php echo $putanja; ?>autorizacija.php">  Prijava </a>
      <?php }else{?>
       <a class="tiny alert round button prijava" href="<?php echo $putanja; ?>logout.php">  Odjava &raquo <?php echo $_SESSION[$ida . "operater"]->ime; ?> &laquo; </a>
       <?php } ?>	
       
			
		</div>
		<div class="left">
		&copy; Knjižnica Filozofskog fakulteta Osijek, <?php echo date("Y"); ?>
	</div>
	</div>
	</div>
</div>