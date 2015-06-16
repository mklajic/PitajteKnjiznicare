<?php include_once '../../konfiguracija.php'; 

if(!isset($_SESSION[$ida . "operater"])){
	header("location: ../../logout.php");
}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once '../../head.php'; ?>
    
  </head>
  <body>
   	<?php include_once '../../zaglavlje.php'; ?>
	<?php include_once '../../izbornik.php'; ?>
	
	
	<div class="row pretraga">
	<div class="large-12 columns">
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
			
				
			
			
	<div class="row">
    <div class="large-12 columns">
      <div class="row collapse">
        <div class="small-11 columns">
          <input  type="text" name="uvjet" placeholder="Pretraži..." value="<?php echo isset($_POST["uvjet"]) ? $_POST["uvjet"] : ""; ?>" />
        </div>
        <div class="small-1 columns">
         	<input type="submit" class="secondary button tiny postfix" value="Traži" />
        </div>
      </div>
    </div>
  </div>
			
			<div id="rezultati" class="row"> 	
		</form>
	</div>
	</div>
	</div>
		
			
			<div class="row">
					<div class="large-12 columns">
					<a href="dodaj.php?sifra=<?php echo $o->sifra; ?>" class=" button small expand">Dodaj novu godinu</a>
			</div>
			
			<div class="row">
			<div class="large-12 columns" align="center">
				
<table>
  <thead>
    <tr>
    	<th width="90">Sifra</th>
    	<th width="760">Naziv</th>
      <th width="50"></th>
      <th width="50"></th>
    </tr>
  </thead>
  <tbody>
					
				
			<?php 
			
	if (isset($_GET["stranica"])) {
	$stranica = $_GET["stranica"];
	} else {
	$stranica = 1;
	}
			
			$uvjet="";
			if($_POST){
			$uvjet=$_POST["uvjet"];				
			}
			
			$uvjet= "%" . $uvjet . "%";
			
			$izraz=$veza-> prepare("select * from godina where concat(sifra, ' ',naziv) like :uvjet limit " . (($stranica * 10)-10) . ",10");
			$izraz->bindParam(":uvjet", $uvjet);
			$izraz->execute();
			
			$rezultati=$izraz->fetchAll(PDO::FETCH_OBJ);
			foreach($rezultati as $o){
				?>
				
				<tr>
				<td>	<?php echo $o->sifra?>  </td>
				<td>	<?php echo $o->naziv;?>  </td>
				<td>	<a href="promjena.php?sifra=<?php echo $o->sifra; ?>">  <img src="../../img/settings18.png" alt="" align="center" /> </td>
				<td>	<a href="brisanje.php?sifra=<?php echo $o->sifra; ?>"> <img src="../../img/delete97.png" alt="" align="center" />  </a> <br/> </td>
				</tr>

				</div>
				</div>
				
			<?php }
			?>

		</div>
		</tbody>
		</table>
		<div class="row">
				<div class="pagination-centered">
					<ul class="pagination">
						<li class="arrow">
					<a href="index.php?stranica=<?php

					if ($stranica > 1) {
						$prethodna = $stranica - 1;
						echo $prethodna;
					} else {
						echo 1;
					}
					?>&uvjet=<?php echo $uvjet ?>" class="button siroko">&laquo;Prethodna</a></li>
				
				<li>
					Stranica: <?php echo $stranica; ?>
				</li>
				<li>
					<a href="index.php?stranica=<?php

					echo ++$stranica;
					?>&uvjet=<?php echo $uvjet ?>" class="button siroko">Sljedeća&raquo</a>
				</li>
			</div>
		</div>
			
	
	
	
	<div align="left" class="row">
    <?php include_once '../../podnozje.php'; ?>
    <?php include_once '../../skripte.php'; ?>
   </div>
  </body>
</html>