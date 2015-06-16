<?php include_once '../../konfiguracija.php'; 

if(!isset($_SESSION[$ida . "operater"])){
	header("location: ../../logout.php");
}

$poruka="";
if($_POST){
	
	include_once 'kontrolaDodaj.php';
	
	if(strlen($poruka)==0){
		
		
		$izraz=$veza->prepare("insert into operater(ime, prezime, email, lozinka, uloga) values (:ime, :prezime, :email,md5(:lozinka), :uloga)");
		unset($_POST["lozinkaponovo"]);
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
			<legend>Podatci o operateru</legend>	
				
			<label for="ime">Ime</label>
			<input type="text" name="ime" id="ime" value="<?php echo isset($_POST["ime"]) ? $_POST["ime"] : ""; ?>" />
			
			<label for="prezime">Prezime</label>
			<input type="text" name="prezime" id="prezime" value="<?php echo isset($_POST["prezime"]) ? $_POST["prezime"] : ""; ?>" />	
			
			
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>" />	
			<label for="lozinka">Lozinka</label>
			<input type="password" name="lozinka" id="lozinka"  />	
			<label for="lozinkaponovo">Ponovno lozinka</label>
			<input type="password" name="lozinkaponovo" id="lozinkaponovo"  />	
			<label for="uloga">Uloga</label>
			<select id="uloga" name="uloga">
				<?php
				$izraz = $veza -> prepare("select sifra, naziv from uloga");
				$izraz -> execute();
				$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
				foreach($rezultati as $o): ?>
				<option value="<?php echo $o->sifra ?>"><?php echo $o->naziv ?></option>
				<?php
				endforeach;			
				?>
			</select>


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
