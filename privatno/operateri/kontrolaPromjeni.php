<?php



if(trim($_POST["ime"])==""){
	$poruka="Unos imena operatera je obvezno!";
	return;
}

if(trim($_POST["prezime"])==""){
	$poruka="Unos prezimena obvezan!";
	return;
}

if(trim($_POST["email"])==""){
	$poruka="Unos email adrese operatera je obvezan!";
	return;
}

$izraz=$veza->prepare("select * from operater where email=:email and sifra!=:sifra");
$izraz->bindParam(":email", $_POST["email"]);
$izraz->bindParam(":sifra", $_POST["sifra"]);
$izraz->execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);

if($o!=null){
	$poruka="Operater s navedenom email adresom već postoji";
}

	if((strlen(trim($_POST["lozinka"]))>0 ||
	strlen(trim($_POST["lozinkaponovo"]))>0) && 
	 trim($_POST["lozinka"])!=trim($_POST["lozinkaponovo"])){
		$poruka="Lozinke ne odgovaraju";
		return;
	}