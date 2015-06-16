<?php include_once 'konfiguracija.php'; 


$porukaIme="";
$porukaPrezime="";
$porukaEmail="";
$porukaKolegij="";
$porukaUpit="";
$poruka="";

	if($_POST){
	

	
	
		$o=new stdClass();
		$o->ime=$_POST["ime"];
		$o->prezime=$_POST["prezime"];
		$o->email=$_POST["email"];
		$o->kolegij=$_POST["kolegij"];
		$o->pitanje=$_POST["pitanje"];	
			

$izraz = $veza -> prepare("select b.sifra as sifra from student a inner join godina_student b
		on a.sifra=b.student where a.email=:email and b.sifra=:godina");
				$izraz->bindParam("email", $_POST["email"]);
				$izraz->bindParam("godina", $_POST["godina"]);
				$izraz -> execute();
				$student = $izraz -> fetch(PDO::FETCH_OBJ);
				
				if($student!=null){
				include_once 'korisnikVecUBazi.php';

				}else{
				include_once 'korisnikNijeUBazi.php' ;
				}
		
				
	
} else {
	$o=new stdClass();
		$o->ime="";
		$o->prezime="";
		$o->pitanje="";	
		$o->kolegij="";	
		$o->email="";
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
		
		<div class="large-12 columns">
			
			<form id="formaUpit" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
			<fieldset>
			<legend>Pošalji upit</legend>	
			<div class="large-6 columns">	
				
			<label for="Ime">Ime
			<input class="error" type="text" name="ime" id="ime" value="<?php echo $o->ime ?>"  />
			<small id="porukaIme" class="error"></small></label>
			</br>
			
			<label for="prezime">Prezime
			<input class="error" type="text" name="prezime" id="prezime" value="<?php echo $o->prezime ?>"  />
			<small id="porukaPrezime" class="error"></small></label>
			</br>
			<label for="email">Email
			<input class="error" type="email" name="email" id="email" value="<?php echo $o->email ?>" placeholder="iprezime@ffos.hr"  />
			<small id="porukaEmail" class="error"></small></label>
   			</br>
   			<label for="kolegij">Kolegij
			<input class="error" type="text" name="kolegij" id="kolegij" value="<?php echo $o->kolegij ?>" />
			<small id="porukaKolegij" class="error"></small> </label>
   		
			
		
			
			</div>
			<div class="large-6 columns">	
			
			
			<label for="Studij">Studij
			<select class="error" id="studij" name="studij">
				<option value="">Odaberite</option>
				<?php
				$izraz = $veza -> prepare("select sifra, naziv from studij group by naziv");
				$izraz -> execute();
				$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
				foreach($rezultati as $o): ?>
				<option value="<?php echo $o->sifra ?>"><?php echo $o->naziv ?></option>
				<?php
				endforeach;			
				?>
			</select>
			<small id="porukaStudij" class="error"></small> </label>
			</br>
			

			<label for="godina">Godina 
			<select class="error" id="godina" name="godina">
				
				<option value="">Odaberite</option>
				<?php
				$izraz = $veza -> prepare("select sifra, naziv from godina");
				$izraz -> execute();
				$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
				foreach($rezultati as $o): ?>
				<option value="<?php echo $o->sifra ?>"><?php echo $o->naziv ?></option>
				<?php
				endforeach;			
				?>
			</select>
			<small id="porukaGodina" class="error"></small> </label>
			</br>

			<label for="podrucje"> Područje upita
			<select class="error" id="podrucje" name="podrucje">
			<option value="">Odaberite</option>
				<?php
				$izraz = $veza -> prepare("select sifra, naziv from podrucje group by naziv");
				$izraz -> execute();
				$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
				foreach($rezultati as $o): ?>
				<option value="<?php echo $o->sifra ?>"><?php echo $o->naziv ?></option>
				<?php
				endforeach;			
				?>
			</select> 
			<small id="porukaPodrucje" class="error"></small></label>
			</br>
			<form class="error" name="box" id="box">

				<?php 
				$izraz= $veza -> prepare("select sifra, naziv from jezik");
				$izraz -> execute();
				$rezultati= $izraz -> fetchAll(PDO::FETCH_OBJ);
				foreach ($rezultati as $o):
				?>
				<label><div  class="large-4 columns">	
				<input class="error" type="checkbox" name="jezici[]" id="jezici" value="<?php echo $o->sifra ?>" /> <?php echo $o->naziv ?>  
						
				</div>
				<?php endforeach; ?>	
				</form>
				<small id="porukaBox" class="error"></small> </label>
			</div>	
			</br>
			
			<div class="large-12 columns">
			</br>	
			<textarea placeholder="Ovdje unesite pitanje..." rows="3" name="pitanje" id="pitanje" class="error" ><?php echo $o->pitanje ?></textarea>
			<small id="porukaUpit" name="porukaUpit" class="error"></small>
        	<input type="hidden" name="datum_pitanja" id="datum_pitanja" value="<?php echo date("Y-m-d") ?>" />
        	</br>
      		</div>
			
		
				<div class="large-6 push-4 columns"><a href="index.php" class="secondary small alert round button">Odustani</a></div>
				<div class="large-6 columns"><input type="submit" class="secondary small round button" value="Pošalji" /> </div>
				
			
			</fieldset>			
			</form>
			
		</div>
		
	</div>
	
	
	
    <?php include_once 'podnozje.php'; ?>
    <?php include_once 'skripte.php'; ?>
    <script>
    
  	
  	
  	$(function(){
  		
  		$("#porukaIme").hide();
  		$("#porukaPrezime").hide();
  		$("#porukaEmail").hide();
  		$("#porukaKolegij").hide();
  		$("#porukaUpit").hide();
  		$("#porukaBox").hide();
  		$("#porukaStudij").hide();
  		$("#porukaGodina").hide();
  		$("#porukaPodrucje").hide();
		
  		
  		$("#formaUpit").submit(function(){
  		$("#porukaIme").hide();
  		$("#porukaPrezime").hide();
  		$("#porukaEmail").hide();
  		$("#porukaKolegij").hide();
  		$("#porukaUpit").hide();
  		$("#porukaBox").hide();
  		$("#porukaStudij").hide();
  		$("#porukaGodina").hide();
  		$("#porukaPodrucje").hide();
  			
  			
  		
  		if($("#ime").val().trim().length==0){
  			$("#porukaIme").html("Obvezan unos imena");
  			$("#porukaIme").show();
  			$("#ime").focus();
  			return false;
  		}	
  			if($("#prezime").val().trim().length==0){
  			$("#porukaPrezime").html("Obvezan unos prezimena!");
  			$("#porukaPrezime").show();
  			$("#prezime").focus();
  			return false;
  		}
  	
  	if($("#email").val().trim().length==0){
  			$("#porukaEmail").html("Unos email adrese je obvezan!");
  			$("#porukaEmail").show();
  			$("#email").focus();
  			return false;
  		}
  		
  
  		if($("#email").val().substr(-8)!="@ffos.hr"){
  			$("#porukaEmail").html("Potreban je unos @ffos.hr email adrese!");
  			$("#porukaEmail").show();
  			$("#email").focus();
  			return false;
  		}
  		
  		if($("#kolegij").val().trim().length==0){
  			$("#porukaKolegij").html("Unos kolegija obvezan!");
  			$("#porukaKolegij").show();
  			$("#kolegij").focus();
  			return false;
  		}
  		
  		if($("#studij").val()==""){
  			$("#porukaStudij").html("Odabir studija obvezan!");
  			$("#porukaStudij").show();
  			$("#studij").focus();
  			return false;
  		}

  		
  		if($("#godina").val()==""){
  			$("#porukaGodina").html("Odabir godine obvezan!");
  			$("#porukaGodina").show();
  			$("#godina").focus();
  			return false;
  		}
  			
  		
  		if($("#podrucje").val()==""){
  			$("#porukaPodrucje").html("Odabir područja  obvezan!");
  			$("#porukaPodrucje").show();
  			$("#podrucje").focus();
  			return false;
  		}
  		
  		
  	  if($('input[name="jezici[]"]').is(':checked')){
    	return true;
		}else{
		$("#porukaBox").html("Potrebno je označiti jedan ili više jezika!");
		$("#porukaBox").show();
		$("#box").focus();
		 return false;
}
  		
  			if($("#pitanje").val().trim().length==0){
  			$("#porukaUpit").html("Unos upita obvezan!");
  			$("#porukaUpit").show();
  			$("#pitanje").focus();
  			return false;
  		}

		  			return true;
  		});
  		
  	});
  	
  </script>
    
  </body>
</html>
