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
		$izraz=$veza->prepare("update upit set odgovor=:odgovor where sifra=:sifra");	
		$izraz->execute($_POST);
		header("location: index.php");
		
	}else{
		$o=new stdClass();
		$o->sifra=$_POST["sifra"];
		$o->odgovor=$_POST["odgovor"];
		
	}

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
			<legend>Izmjena upita br: <?php echo $o->sifra;?></legend>	
				
			<label>
			<textarea class="error" rows="19" id="odgovor" name="odgovor"> <?php echo $o->odgovor;?> </textarea>
			<?php 
			if(strlen($poruka)>0){
				?>
			
				<small class="error"><?php echo $poruka ?></small> </label>
			
			<?php }
			?>
			<input type="hidden" name="sifra" value="<?php echo $o->sifra;?>" />
			
			<div class="row">
				<div class="large-8 push-2 columns" align="center">
				<a href="index.php" class="secondary  small alert round button dugme">Odustani</a>
				<input type="submit" class="secondary round small button  " value="Promijeni" />
			</div>
			</div>
			</fieldset>			
			</form>
			
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
