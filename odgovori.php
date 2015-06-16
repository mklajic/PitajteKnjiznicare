<?php include_once 'konfiguracija.php'; 

if(isset($_GET["sifra"]))
$podrucje=$_GET["sifra"];
else if (isset($_POST["podrucje"]))
$podrucje=$_POST["podrucje"];
else
	header("location: XXXX");

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once 'head.php'; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $putanja; ?>/DataTables-1.10.7/media/css/jquery.dataTables.css">
  </head>
  <body>
   	<?php include_once 'zaglavlje.php'; ?>
	<?php include_once 'izbornik.php'; ?>
	
	
	<div class="row pretraga">
	<div class="large-12 columns">
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
			
				
			
			
			<div id="rezultati" class="row"> 	
		</form>
	</div>
	</div>
	</div>

			<div class="row">
			<div class="large-12 columns">
				
			<table id="example" class="display">
  			<thead>
   			 <tr>
    			<th width="100">Br.</th>
    			<th width="100">Datum</th>
      			<th width="670">Pitanje</th>
      			<th width="90"></th>
    		</tr>
  			</thead>
  			<tbody>
					
				
			<?php 
			
			
			
		$uvjet="";
		if ($_POST) {
		$uvjet = $_POST["uvjet"];
		} else if (isset($_GET["uvjet"])) {
			$uvjet = $_GET["uvjet"];
		}
			$uvjetZaUpit= "%" . $uvjet . "%";
			
			$izraz=$veza-> prepare("select  a.sifra as sifraOdgovora, a.pitanje as pitanje, 
			a.odgovor as odgovor, a.datum_pitanja as datum
				from upit a
				inner join godina_student b on a.godina_student=b.sifra
				inner join godina c on b.godina=c.sifra
				inner join student d on b.student=d.sifra
				inner join studij e on d.studij=e.sifra
				where a.podrucje=:podrucje and concat(a.sifra, ' ',a.pitanje) like :uvjet 
				and a.odgovor is not null group by a.sifra desc");
				$izraz->bindParam(":podrucje", $podrucje);
				$izraz->bindParam(":uvjet", $uvjetZaUpit);
			$izraz->execute();
			
			$rezultati=$izraz->fetchAll(PDO::FETCH_OBJ);
			foreach($rezultati as $o){
				
				$d=$o->datum;
				$d=substr($d, 8,2) . "." . substr($d, 5,2) . "." . substr($d, 0,4) . ".";
				?>
				<tr >
				<td>	<?php echo $o->sifraOdgovora;?>  </td>
				<td>	<?php echo $d;?>  </td>
				<td>	<?php echo $o->pitanje;?>  </td>
				<td>	<a href="odgovorVise.php?sifra=<?php echo $o->sifraOdgovora;?> "> Pogledaj </a> </td>
				</tr>
				
				</div>
				</div>
			<?php }

			?>
		</div>
		</tbody>
		</table>


	<div align="left" class="row">
    <?php include_once 'podnozje.php'; ?>
    <?php include_once 'skripte.php'; ?>


	<script type="text/javascript" charset="utf8" src="<?php echo $putanja; ?>/DataTables-1.10.7/media/js/jquery.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo $putanja; ?>/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>


    </script>    
    <script>
    	
    	$(document).ready(function() {
    $('#example').dataTable();
} );
    	
    </script>
    
   </div>
  </body>
</html>