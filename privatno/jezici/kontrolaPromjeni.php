<?php



if(trim($_POST["naziv"])==""){
	$poruka="Unos jezika je obvezan!";
	return;
}

$izraz=$veza->prepare("select * from jezik where naziv=:naziv and sifra!=:sifra"); 
$k=$_POST["naziv"];
$izraz->bindParam(":naziv", $k);
$j=$_POST["sifra"];
$izraz->bindParam(":sifra", $j);
$izraz->execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);

if($o!=null){
	$poruka="Jezik već postoji";
}

