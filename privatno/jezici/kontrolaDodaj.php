<?php



if(trim($_POST["naziv"])==""){
	$poruka="Unos naziva jezika je obvezan!";
	return;
}





$izraz=$veza->prepare("select * from jezik where naziv=:naziv");
$k=$_POST["naziv"];
$izraz->bindParam(":naziv", $k);
$izraz->execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);

if($o!=null){
	$poruka="Jezik već postoji";
}

