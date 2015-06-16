<?php include_once '../../konfiguracija.php'; 

if(!isset($_SESSION[$ida . "operater"])){
	header("location: ../../logout.php");
}

if (!((isset($_GET["sifra"]) && ctype_digit($_GET["sifra"])) || isset($_POST["sifra"]))) {
	header("location: ../../logout.php");
}else{
	if(isset($_GET["sifra"])){
		$sifra=$_GET["sifra"];
	}else{
		$sifra=$_POST["sifra"];
	}
}
$poruka="";
if($_POST){
	include_once 'kontrolaPromjeni.php';

	if(strlen($poruka)==0){
		if(strlen($_POST["lozinka"])>0){
			$izraz=$veza->prepare("update operater set ime=:ime, prezime=:prezime, email=:email, lozinka=md5(:lozinka), uloga=:uloga where sifra=:sifra");
			unset($_POST["lozinkaponovo"]);
			
		}else{
			$izraz=$veza ->prepare("update operater set ime=:ime, prezime=:prezime, email=:email, uloga=:uloga where sifra=:sifra");
			unset($_POST["lozinka"]);
			unset($_POST["lozinkaponovo"]);
		}
		$izraz->execute($_POST);
		header("location: index.php");
		
		
	}else{
		$o=new stdClass();
		$o->sifra=$_POST["sifra"];
		$o->ime=$_POST["ime"];
		$o->prezime=$_POST["prezime"];
		$o->email=$_POST["email"];
		$uloga->sifra=$_POST["uloga"];
		$o->lozinka=$_POST["lozinka"];
		$o->lozinkaponovo=$_POST["lozinkaponovo"];
	}

}

if($_GET){
	
$izraz=$veza-> prepare("select * from operater where sifra=:sifra");
$izraz->bindParam(":sifra", $sifra);
$izraz-> execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);
$o->lozinka="";
$o->lozinkaponovo="";
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
			<legend>Podaci o operateru</legend>	
				
			<label for="ime">Ime</label>
			<input type="text" name="ime" id="ime" value="<?php echo $o->ime ?>" />
			
			<label for="prezime">Prezime</label>
			<input type="text" name="prezime" id="prezime" value="<?php echo $o->prezime ?>" />	
			
			
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="<?php echo $o->email ?>" />	
			<label for="email">Lozinka</label>
			<input type="password" name="lozinka" id="lozinka" value="<?php echo $o->lozinka ?>" />	
			<label for="email">Lozinka ponovno</label>
			<input type="password" name="lozinkaponovo" id="lozinkaponovo" value="<?php echo $o->lozinkaponovo ?>"/>	
			<label for="uloga">Uloga</label>
			<select id="uloga" name="uloga">
				<?php
				$izraz = $veza -> prepare("select sifra, naziv from uloga group by naziv desc");
				$izraz -> execute();
				$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
				foreach($rezultati as $uloga): ?>
				<option value="<?php echo $uloga->sifra ?>"><?php echo $uloga->naziv ?></option>
				<?php
				endforeach;			
				?>
			</select>
			<input type="hidden" name="sifra" value="<?php echo $o->sifra;?>" />

			<div class="row">
				<div class="large-8 push-2 columns" align="center">
				<a href="index.php" class="secondary  small button ">Odustani</a>
				<input type="submit" class="secondary button small " value="Potvrdi" />
			</div>
			</div>
			
			</fieldset>			
			</form>
			<?php 
			if(strlen($poruka)>0){
				?>
			<div class="large-12 columns">
				<small class="error"><?php echo $poruka ?></small>
			</div>
			<?php }
			?>
		</div>
		
	</div>
	
	
	
    <?php include_once '../../podnozje.php'; ?>
    <?php include_once '../../skripte.php'; ?>
    
  </body>
</html>
