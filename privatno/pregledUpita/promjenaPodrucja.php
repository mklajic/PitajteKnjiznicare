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
	
		$izraz=$veza->prepare("update upit set podrucje=:podrucje where sifra=:sifra");	
		$izraz->execute($_POST);

		header("location: index.php");


}

if($_GET){
	
$izraz=$veza-> prepare("select * from upit where sifra=:sifra");
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
		
		<div class="large-8 push-2 columns">
		
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
			<fieldset>
			
			<?php
				$izraz = $veza -> prepare("select b.naziv as naziv from upit a inner join podrucje b
				on a.podrucje=b.sifra
				where a.sifra=:sifra");
				$izraz->bindParam("sifra", $sifra);		
				$izraz -> execute();
				$p = $izraz -> fetch(PDO::FETCH_OBJ);
						
				?>	
				
			<legend>Promjena područja: <?php echo $p->naziv; ?> </legend>	
			<label for="pitanje"> Pitanje:  <?php echo $o->pitanje ?>    </label>
			
			<select id="podrucje" name="podrucje">
				<?php
				$izraz = $veza -> prepare("select sifra, naziv from podrucje");
				$izraz -> execute();
				$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
				foreach($rezultati as $r): ?>
				<option value="<?php echo $r->sifra ?>"><?php echo $r->naziv ?></option>
				<?php
				endforeach;			
				?>
			</select> 
			<input type="hidden" name="sifra" value="<?php echo $sifra; ?>" />
			<div align="center">
			<a href="index.php" class="alert small button round"> Odustani </a>
			<input type="submit" class="secondary small round button" value="Promijeni" />
			</div>
			</fieldset>			
			</form>
			
		</div>
		
	</div>
	
	
	
    <?php include_once '../../podnozje.php'; ?>
    <?php include_once '../../skripte.php'; ?>


    
  </body>
</html>
