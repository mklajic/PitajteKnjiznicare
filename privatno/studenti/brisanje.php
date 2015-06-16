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
	
	$veza -> beginTransaction();
	
	$izraz = $veza->prepare("delete from godina_student where student=:sifra");
	$izraz->execute($_POST);
	
	$izraz = $veza->prepare("delete from student where sifra=:sifra");
	$izraz->execute($_POST);

	$veza->commit();
	
	header("location: index.php");
}				
	


if($_GET){
	
$izraz=$veza-> prepare("select * from student where sifra=:sifra");
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
			<legend>Brisanje </legend>	
				
			<h5 align="center"> Jeste li sigurni da želite obrisati studenta: </br> 
		 <?php echo $o->prezime ?>, <?php echo $o->ime ?> </h5> 
			
			<input type="hidden"  name="sifra" value="<?php echo $o->sifra?>" />

			<div align="center">
				<input type="submit" class="secondary small button" value="Da" />
				<a href="index.php" class="secondary button small ">Ne</a>
			</div>
			</fieldset>			
			</form>
			
		</div>
		
	</div>
	
	
	
    <?php include_once '../../podnozje.php'; ?>
    <?php include_once '../../skripte.php'; ?>
    
  </body>
</html>
