<?php include_once '../../konfiguracija.php'; 

if(!isset($_SESSION[$ida . "operater"])){
	header("location: ../../logout.php");
}

$poruka="";
if($_POST){
	
	include_once 'kontrolaDodaj.php';
	
	if(strlen($poruka)==0){
		$izraz=$veza->prepare("insert into studij(naziv) values (:naziv)");
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
			<legend>Studij</legend>	
				
			<label for="naziv">Naziv studija</label>
			<input type="text" name="naziv" id="naziv" value="<?php echo isset($_POST["naziv"]) ? $_POST["naziv"] : ""; ?>" />
			
			

		<div class="large-10 push-2 columns">
				<a href="index.php" class="secondary button">Odustani</a>
				<input type="submit" class="secondary button radius" value="Nastavi" />
			</div>	
			
			</fieldset>			
			</form>
			
			<?php 
			if(strlen($poruka)>0){ ?>
				<div class="row">
    			<div class="large-12 columns">
    			<small class="error" id="poruka"><?php echo $poruka; ?></small>		
    			</div>
    		</div>
			<?php }
			?>
		</div>
		
	</div>
	
	
	
    <?php include_once '../../podnozje.php'; ?>
    <?php include_once '../../skripte.php'; ?>
    
  </body>
</html>
