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



if($_POST){
	
	
	$izraz  =$veza->prepare("delete from godina where sifra=:sifra");
	$izraz->execute($_POST);
	header("location: index.php");
}				
	


if($_GET){
	
$izraz=$veza-> prepare("select * from godina where sifra=:sifra");
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
			<legend>Brisanje godine </legend>	
				
			<h5 align="center"> Jeste li sigurni da želite obrisati godinu: </br> 
		<?php echo $o->naziv ?> </h5> 
			
			<input type="hidden"  name="sifra" value="<?php echo $o->sifra?>" />

			<div align="center">
				<a href="index.php" class="secondary button alert round small ">Ne</a>
				<input type="submit" class="secondary small round button" value="Da" />
			</div>
			</fieldset>			
			</form>
			
		</div>
		
	</div>
	
	
	
    <?php include_once '../../podnozje.php'; ?>
    <?php include_once '../../skripte.php'; ?>
    
  </body>
</html>
