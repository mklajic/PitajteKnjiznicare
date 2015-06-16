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
	
<div class="row">
<div class="large-12 columns">
 <ul class="breadcrumbs">
  <li><a href="index.php">Neodgovoreni upiti</a></li>
  <li><a href="odgovoreniUpiti.php">Odgovoreni upiti</a></li>
  <li><a href="sviUpiti.php"><b>Svi upiti</b></a></li>
</ul>
</div>
</div>	

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
					
				
			<?php 
			
	if (isset($_GET["stranica"])) {
	$stranica = $_GET["stranica"];
	} else {
	$stranica = 1;
	}
			
			$uvjet="";
			if ($_POST) {
			$uvjet = $_POST["uvjet"];
			} else if (isset($_GET["uvjet"])) {
				$uvjet = $_GET["uvjet"];
			}
			$uvjetZaUpit= "%" . $uvjet . "%";
			
			$izraz=$veza-> prepare("select a.sifra as sifra, d.ime, d.prezime, d.email,
				e.naziv as studij, c.naziv as godina, a.kolegij, a.pitanje, a.odgovor, a.datum_pitanja as datum, f.naziv as podrucje
				from upit a
				inner join godina_student b on a.godina_student=b.sifra
				inner join godina c on b.godina=c.sifra
				inner join student d on b.student=d.sifra
				inner join studij e on d.studij=e.sifra
				inner join podrucje f on f.sifra=a.podrucje
				where concat(a.sifra, ' ',a.pitanje) like :uvjet order by a.sifra desc limit " . (($stranica * 10)-10) . ",10");
			$izraz->bindParam(":uvjet", $uvjetZaUpit);
			$izraz->execute();
			
			?>			
		<table>
  		<thead>
    	<tr>
      		<th width="80">Br.</th>
     		<th width="100">Datum</th>
      		<th width="570">Pitanje</th>
      		<th width="210">Područje</th>
      		<th width="40"></th>
   		 </tr>
  		</thead>
 		 <tbody>
	<?php		
			$rezultati=$izraz->fetchAll(PDO::FETCH_OBJ);
			foreach($rezultati as $o){
				$d=$o->datum;
				$d=substr($d, 8,2) . "." . substr($d, 5,2) . "." . substr($d, 0,4) . ".";
				?>
				
			<div class="large-12  columns">
				<tr href="../odgovori/promjena.php?sifra=<?php echo $o->sifra; ?>">	
				<td >	<?php echo $o->sifra; ?> </td>
				<td>	<?php echo $d; ?> </td>
				<td>	<?php echo $o->pitanje; ?> </td>
				<td>	<?php echo $o->podrucje; ?> </td>
				<td>	<img src="../../img/settings18.png" alt="" align="center" /> </td>
				</tr>

					
					
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
					<a href="sviUpiti.php?stranica=<?php

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
					<a href="sviUpiti.php?stranica=<?php

					echo ++$stranica;
					?>&uvjet=<?php echo $uvjet ?>" class="button siroko">Sljedeća&raquo</a>
				</li>
			</div>
		</div>

	<div align="left" class="row">
    <?php include_once '../../podnozje.php'; ?>
    <?php include_once '../../skripte.php'; ?>
    
      <script>
    	
    	$(document).ready(function(){
    $('table tr').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
});
    	
    </script>
    
   </div>
  </body>
</html>