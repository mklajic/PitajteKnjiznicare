<?php



if(trim($_POST["naziv"])==""){
	$poruka="Unos godine je obvezan!";
	return;
}





$izraz=$veza->prepare("select * from godina where naziv=:naziv");
$k=$_POST["naziv"];
$izraz->bindParam(":naziv", $k);
$izraz->execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);

if($o!=null){
	$poruka="Godina je već unešena";
}

