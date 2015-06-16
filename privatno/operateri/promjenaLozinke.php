<?php include_once '../../konfiguracija.php'; 

if(!isset($_SESSION[$ida . "operater"])){
	header("location: ../../logout.php");
}

$sifra=$_SESSION[$ida . "operater"]->sifra;
$izraz=$veza-> prepare("select * from operater where sifra=:sifra");
$izraz->bindParam(":sifra", $sifra);
$izraz-> execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);
$o->lozinka="";
$o->lozinkaponovo="";

$poruka="";
if($_POST){
	include_once 'kontrolaPromjeniLozinku.php';

	if(strlen($poruka)==0){
			$izraz=$veza->prepare("update operater set  lozinka=md5(:lozinka) where sifra=:sifra");
			unset($_POST["lozinkaponovo"]);
			$izraz->execute($_POST);
			header("location: ../pregledUpita/index.php");
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
			<legend> <?php echo $o->ime; ?> <?php echo $o->prezime; ?> </legend>		
			<label for="lozinka">Nova lozinka</label>
			<input type="password" name="lozinka" id="lozinka" value="<?php echo $o->lozinka ?>" />	
			<label for="email">Nova lozinka ponovno</label>
			<input type="password" name="lozinkaponovo" id="lozinkaponovo" value="<?php echo $o->lozinkaponovo ?>"/>	
			<input type="hidden" name="sifra" value="<?php echo $o->sifra;?>" />

			<div class="row">
				<div class="large-8 push-2 columns" align="center">
				<a href="../pregledUpita/index.php" class="secondary  small button ">Odustani</a>
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
