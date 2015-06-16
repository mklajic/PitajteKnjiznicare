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


$m= "http://web.ffos.hr/pitajteknjiznicare/odgovorVise.php?sifra=" . $sifra;			

//upit za pronalazak emaila
$izraz=$veza-> prepare("select  a.sifra as sifra, a.pitanje as pitanje, a.datum_pitanja as datum, 
								d.email as email, g.naziv as naziv, g.sifra as sifraPodrucja
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
$email = $o -> email;


$poruka="";
if($_POST){
	//include_once 'kontrolaPromjeni.php';

	//if(strlen($poruka)==0){
		$veza -> beginTransaction();
		
		$izraz=$veza->prepare("update upit set odgovor=:odgovor, odgovor_datum=:odgovor_datum where sifra=:sifra");	
		$izraz->bindParam("sifra", $sifra);
		$izraz->bindParam("odgovor", $_POST["odgovor"]);
		$izraz->bindParam("odgovor_datum", $_POST["odgovor_datum"]);
		$izraz->execute();

		//slanje emaila
		$to      = $email ;
		$subject = 'Odgovor na upit broj: ' . $sifra . '';
		$message = 'Dobar dan!'. "\r\n" . "\r\n" . 'Odgovor na upit koji ste poslali možete pronaći na adresi: ' . $m . "\r\n" .  "\r\n" . 'Lijepi pozdrav,'. "\r\n" . 'Knjižnica Filozofskog fakulteta Osijek' ;
		$headers = 'From: Usluga Pitajte knjižničare <knjiznica@ffos.hr>' . "\r\n" .
					'Content-Type: text/plain;charset=utf-8\r\n' .
		   			'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);

		$veza -> commit();			 
		header("location: index.php");
		
	//}

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
		
		<div class="large-12 columns">
		
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
			<fieldset>
			<legend>Odgovori na upit br: <?php echo $o->sifra; ?> </legend>	
			<label for="pitanje"> <h6> Pitanje: <i> <?php echo $o->pitanje ?> </i> </h6> </label>
			<?php
				$izraz = $veza -> prepare("select a.sifra as sifra, c.naziv as naziv from upit a 
				inner join upit_jezik b on b.upit=a.sifra
				inner join jezik c on b.jezik=c.sifra
				where a.sifra=:sifra");
				$izraz->bindParam("sifra", $sifra);
				$izraz -> execute();
				$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
				foreach($rezultati as $o): ?>
						<?php echo $o->naziv ?>;  
				<?php
				endforeach;			
				?>
			<label> </label>
			<textarea rows="15" name="odgovor" id="odgovor"></textarea>
			<input type="hidden" name="sifra" value="<?php echo $o->sifra; ?>" />
			
			<input type="hidden" name="odgovor_datum" value="<?php echo date("Y-m-d") ?>" />
				<div class="row">
				<div class="large-8 push-2 columns" align="center">
				<a href="index.php" class="secondary small button dugme ">Odustani</a>
				<input type="submit" class="secondary small button " value="Odgovori" />
				
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
<script type="text/javascript" src="<?php echo $putanja; ?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
    
  </body>
</html>
