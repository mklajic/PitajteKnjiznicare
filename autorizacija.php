<?php include_once 'konfiguracija.php'; 

if(isset($_POST["email"]) || isset($_POST["lozinka"])) {
	
	$izraz= $veza-> prepare("select * from operater where email=:email and lozinka=:lozinka");
	$e=$_POST["email"];
	$izraz->bindParam(":email", $e);
	$l=md5($_POST["lozinka"]);
	$izraz -> bindParam(":lozinka", $l);
	$izraz -> execute();
	
	$operater= $izraz->fetch(PDO::FETCH_OBJ);
	
	if($operater!=null){
		$_SESSION[$ida . "operater"]=$operater;
		header("location: privatno/pregledUpita/index.php");
	} else{
		$poruka="Krivo uneseni podaci!";
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

	<?php include_once 'izbornik.php'; ?>
    
    
    <div class="row">
    	<div class="large-6 push-3 columns">
    		
    		<form id="forma" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    			
    			
    			<fieldset>
    				<legend>Popunite tražene podatke</legend>
    				<label for="korisnik">Email</label>
					<input type="text" id="email" name="email" placeholder="primjer@ffos.hr" />
					<small id="gki" class="error"></small>    		
					
					<label for="lozinka">Lozinka</label>
					<input type="password" id="lozinka" name="lozinka" placeholder="********" />
					<small id="gl" class="error"></small>
					
					<input type="submit" value="Potvrdi" class="secondary button small expand" />    			
					   			
    			</fieldset>
    			
    		</form>
    		
    	</div>
    	 </div>
    	<?php if(isset($poruka)): ?>
    		<div class="row">
    			<div class="large-6 push-3 columns">
    			<small class="error" id="poruka"><?php echo $poruka; ?></small>		
    			</div>
    		</div>
    		
    	<?php endif; 	

  include_once 'podnozje.php'; 
  include_once 'skripte.php'; 
  ?>
  
  <script>
  	
  	$(function(){
  		
  		$("#gki").hide();
		$("#gl").hide();
  		
  		$("#forma").submit(function(){
  		$("#poruka").hide();
		$("#gki").hide();
		$("#gl").hide();	
  			
  			
  		if($("#email").val()==""){
  			$("#gki").html("Obvezan unos email adrese!");
  			$("#gki").show();
  			$("#email").focus();
  			return false;
  		}	
  		if($("#lozinka").val()==""){
  			$("#gl").html("Obvezan unos lozinke!"); 
  			$("#gl").show();
  			$("#lozinka").focus();
  			return false;
  		}	
  			return true;
  		});
  		
  	});
  	
  </script>
  
  
  </body>
</html>
