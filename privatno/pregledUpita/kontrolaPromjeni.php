<?php



if(trim($_POST["naziv"])==""){
	$poruka="Unos naziva studija je obvezan!";
	return;
}

$izraz=$veza->prepare("select * from studij where naziv=:naziv and sifra!=:sifra"); 
$k=$_POST["naziv"];
$izraz->bindParam(":naziv", $k);
$j=$_POST["sifra"];
$izraz->bindParam(":sifra", $j);
$izraz->execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);

if($o!=null){
	$poruka="Studij je već unešen";
}

