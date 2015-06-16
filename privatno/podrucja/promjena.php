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
		$izraz=$veza->prepare("update podrucje set naziv=:naziv where sifra=:sifra");	
		$izraz->execute($_POST);
		header("location: index.php");
		
	}else{
		$o=new stdClass();
		$o->sifra=$_POST["sifra"];
		$o->naziv=$_POST["naziv"];
		
	}

}

if($_GET){
	
$izraz=$veza-> prepare("select * from podrucje where sifra=:sifra");
$izraz->bindParam(":sifra", $sifra);
$izraz-> execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);

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
			<legend>Područje</legend>	
				
			<label for="naziv">Naziv</label>
			<input type="text" name="naziv" id="naziv" value="<?php echo $o->naziv ?>" />
			<input type="hidden" name="sifra" value="<?php echo $o->sifra;?>" />
			<div class="row">
				<div class="large-8 push-2 columns" align="center">
				<input type="submit" class="secondary button small " value="Promjeni" />
				<a href="index.php" class="secondary  small button ">Odustani</a>
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
