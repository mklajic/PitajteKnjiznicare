<?php include_once '../../konfiguracija.php'; 

if(!isset($_SESSION[$ida . "operater"])){
	header("location: ../../logout.php");
}

$poruka="";
if($_POST){
	
	include_once 'kontrolaDodaj.php';
	
	if(strlen($poruka)==0){
		$izraz=$veza->prepare("insert into jezik(naziv) values (:naziv)");
		$izraz->execute($_POST);
	header("location: index.php");
	}
}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once '../../head.php'; ?>
    
  </head>
  <body>
   	<?php include_once '../../zaglavlje.php'; ?>
	<?php include_once '../../izbornik.php'; ?>
	
	
	

	
	<div class="row">
		
		<div class="large-6 push-3 columns">
		
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
			<fieldset>
			<legend>Jezik</legend>	
				
			<label for="naziv">Naziv jezika
			<input class="error" type="text" name="naziv" id="naziv" value="<?php echo isset($_POST["naziv"]) ? $_POST["naziv"] : ""; ?>" />
			<?php 
			if(strlen($poruka)>0){ ?>
			
    			<small class="error" id="poruka"><?php echo $poruka; ?></small>	</label>	
    			
    		
			<?php }
			?>
			
			</br>
			<div class="large-10 push-2 columns">
				<a href="index.php" class="secondary small round alert button">Odustani</a>
				<input type="submit" class="secondary small round button radius" value="Nastavi" />
			</div>	
			
			</fieldset>			
			</form>
			
			
		</div>
		
	</div>
	
	
	
    <?php include_once '../../podnozje.php'; ?>
    <?php include_once '../../skripte.php'; ?>
    
  </body>
</html>
