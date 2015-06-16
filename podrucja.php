<?php include_once 'konfiguracija.php'; ?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once 'head.php'; ?>
    
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
					<form>
						<fieldset>
						<legend>Odgovorena pitanja prema područjima</legend>
				
			<?php 
			$izraz=$veza-> prepare("select  g.sifra as sifra, a.pitanje as pitanje, g.naziv as naziv, count(a.odgovor) as ukupno
				from upit a
				inner join godina_student b on a.godina_student=b.sifra
				inner join godina c on b.godina=c.sifra
				inner join student d on b.student=d.sifra
				inner join studij e on d.studij=e.sifra
				inner join podrucje g on a.podrucje=g.sifra
				where a.odgovor is not null
				group by naziv");
			$izraz->execute();
			$rezultati=$izraz->fetchAll(PDO::FETCH_OBJ);
			foreach($rezultati as $o){
				?>
				
				<div class="large-6 columns">
					<a href="odgovori.php?sifra=<?php echo $o->sifra; ?>">
						<div class="panel radius ">
						
					
			<?php echo $o->naziv; ?>  <b> (<?php echo $o->ukupno; ?>) </b> 
					
						</div> 
					</a> 
				</div>
				
			<?php }

			?>
			</fieldset>
			</form>
		</div>
			</div>
			
	
   
   
    <?php include_once 'podnozje.php'; ?>
    <?php include_once 'skripte.php'; ?>
    
  </body>
</html>
