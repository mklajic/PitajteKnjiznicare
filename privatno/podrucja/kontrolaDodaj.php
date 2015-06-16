<?php



if(trim($_POST["naziv"])==""){
	$poruka="Unos naziva područja je obvezan!";
	return;
}





$izraz=$veza->prepare("select * from podrucje where naziv=:naziv");
$k=$_POST["naziv"];
$izraz->bindParam(":naziv", $k);
$izraz->execute();
$o=$izraz->fetch(PDO::FETCH_OBJ);

if($o!=null){
	$poruka="Područje već postoji";
}

