<?php include_once '../konfiguracija.php'; 

if(!isset($_SESSION[$ida . "operater"])){
	header("location: ../logout.php");
}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once '../head.php'; ?>
    
  </head>
  <body>
   	<?php include_once '../zaglavlje.php'; ?>

	<?php include_once '../izbornik.php'; ?>
    
    <div class="row">
    	<div class="large-8 push-2 columns">
    		
  <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$ADMINISTRATOR): ?>
    <div class="icon-bar five-up bar">
  <a  href="operateri/index.php">
    <img src="../img/operateri.svg" >
    <label op> <b>  Operateri </b> </label>
  </a>
  <?php endif;?>
  <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$ADMINISTRATOR): ?>
  <a  href="godine/index.php">
    <img src="../img/godine.svg" >
    <label op>  <b> Godine </b> </label>
  </a>
  <?php endif;?>
  
   <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$ADMINISTRATOR): ?>
  <a href="jezici/index.php">
    <img src="../img/jezici.svg" >
    <label op><b> Jezici </b></label>
  </a>
    <?php endif;?>
     <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$ADMINISTRATOR): ?>
  <a href="studiji/index.php">
    <img src="../img/studiji.svg" >
    <label op> <b> Studiji </b> </label>
  </a>
   <?php endif;?>
</div>

</div>
    </div>
    
        <div class="row iconbar">
    	<div class="large-8 push-2 columns">
    		
  
    <div class="icon-bar five-up">
   <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$ADMINISTRATOR): ?> 	
  <a href="podrucja/index.php">
    <img src="../img/podrucja.svg" >
    <label> <b> Područja </b></label>
  </a>
  <?php endif;?>
  <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$ADMINISTRATOR): ?>
  <a href="studenti/index.php">
    <img src="../img/studenti.svg" >
    <label> <b> Studenti </b> </label>
  </a>
  <?php endif;?>
  <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$ADMINISTRATOR): ?>
   <a  href="pregledUpita/index.php">
    <img src="../img/upiti.svg" >
    <label op> <b> Upiti </b>  </label>
  </a>
  <?php endif;?>
  <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$ADMINISTRATOR): ?>
  <a href="odgovori/index.php">
    <img src="../img/odgovori.svg" >
    <label> <b> Odgovori </b> </label>
  </a>
  <?php endif;?>
  
</div>

</div>
    </div>
    
    
    <?php include_once '../podnozje.php'; ?>
    <?php include_once '../skripte.php'; ?>
    
  </body>
</html>
