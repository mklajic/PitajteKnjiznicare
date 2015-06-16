<?php


	if((strlen(trim($_POST["lozinka"]))>0 ||
	strlen(trim($_POST["lozinkaponovo"]))>0) && 
	 trim($_POST["lozinka"])!=trim($_POST["lozinkaponovo"])){
		$poruka="Lozinke ne odgovaraju";
		return;
	}


if(trim($_POST["lozinka"])==""){
	$poruka="Unos lozinke je obvezan!";
	return;
}

