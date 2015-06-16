<?php include_once 'konfiguracija.php'; 

if (!((isset($_GET["sifra"]) && ctype_digit($_GET["sifra"])) || isset($_POST["sifra"]))) {
	header("location : logout.php");
}else{
	if(isset($_GET["sifra"])){
		$sifra=$_GET["sifra"];
	}else{
		$sifra=$_POST["sifra"];
	}
}
?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once 'head.php'; ?>
    
  </head>
  <body>
   	<?php include_once 'zaglavlje.php'; ?>
	<?php include_once 'izbornik.php'; 
	?>
	
	<div id="rezultati" class="row"> 	
		</form>
	</div>
	</div>
			
			
			<div class="row">
			<div class="large-12 columns">

	<?php
			
			if($_GET){	
$izraz=$veza-> prepare("select  a.sifra as sifraOdgovora, a.pitanje as pitanje, a.odgovor as odgovor, d.email as email,
						a.datum_pitanja as datum, a.odgovor_datum as datumOdgovora, g.naziv as naziv, g.sifra as sifra
				from upit a
				inner join godina_student b on a.godina_student=b.sifra
				inner join godina c on b.godina=c.sifra
				inner join student d on b.student=d.sifra
				inner join studij e on d.studij=e.sifra
				inner join podrucje g on a.podrucje=g.sifra
				where a.sifra=:sifra");
$izraz->bindParam("sifra", $sifra);
$izraz-> execute();
$o=$izraz -> fetch(PDO::FETCH_OBJ);

			?>
				<form>
  				<fieldset> 
  					<legend>Odgovor na pitanje br: <?php echo $o->sifraOdgovora;?> </legend>
				
				<label><?php echo $o->odgovor; ?> </label>

				<?php }
				?>
				 
					</fieldset>
					</form>
					</div>
					</div>


			</div>

    <?php include_once 'podnozje.php'; ?>
    <?php include_once 'skripte.php'; ?>
    
  </body>
</html>
