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

$izraz=$veza->prepare("select * from operater where email=:email");
$k=$_POST["email"];
$izraz->bindParam(":email", $k);
$izraz->execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);

if($o!=null){
	$poruka="Operater s navedenom email adresom već postoji";
}

if(trim($_POST["lozinka"])==""){
	$poruka="Obvezan unos lozinke!";
	return;
}

if(trim($_POST["lozinkaponovo"])==""){
	$poruka="Obvezan ponovni unos lozinke!";
	return;
}

if(trim($_POST["lozinka"])!=trim($_POST["lozinkaponovo"])){
	$poruka="Polja lozinka i lozinka ponovno moraju biti iste!";
	return;
}
