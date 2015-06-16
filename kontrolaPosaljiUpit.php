<?php



if(trim($_POST["ime"])==""){
	$poruka="Unos imena je obvezan!";
	return;
}

if(trim($_POST["prezime"])==""){
	$poruka="Unos prezimena je obvezan!";
	return;
}

$e=$rest = substr($_POST["email"], -8);   
 if($e != "@ffos.hr"){
 $poruka="Vaša email adresa mora završavati na @ffos.hr!";
	return;
 }

if(trim($_POST["kolegij"])==""){
	$poruka="Unos kolegija je obvezan!";
	return;
}

if(trim($_POST["pitanje"])==""){
	$poruka="Unos upita je obvezan!";
	return;
}
