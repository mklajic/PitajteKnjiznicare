<div class="large-2 columns">
<table  id="datatable" class="hidden-for-xxlarge-down">
	<thead>
		<tr>
			<th>2015</th>
			<th>Br. upita</th>
			
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Travanj</th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as travanj from upit a 
									inner join podrucje b on a.podrucje= b.sifra
									where (datum_pitanja between  "2015-04-01" AND "2015-04-30") ');
				$izraz -> execute();
				$mj = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $mj->travanj; ?></td>
		</tr>
			<tr>
			<th>Svibanj</th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as svibanj from upit a 
									inner join podrucje b on a.podrucje= b.sifra
									where (datum_pitanja between  "2015-05-01" AND "2015-05-31") ');
				$izraz -> execute();
				$mj = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $mj->svibanj; ?></td>
		</tr>
		
		<th>Lipanj</th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as lipanj from upit a 
									inner join podrucje b on a.podrucje= b.sifra
									where (datum_pitanja between  "2015-06-01" AND "2015-06-30") ');
				$izraz -> execute();
				$mj = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $mj->lipanj; ?></td>
		</tr>
		
		<th>Srpanj</th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as srpanj from upit a 
									inner join podrucje b on a.podrucje= b.sifra
									where (datum_pitanja between  "2015-07-01" AND "2015-07-31") ');
				$izraz -> execute();
				$mj = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $mj->srpanj; ?></td>
		</tr>
		
		
		<th>Kolovoz</th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as kolovoz from upit a 
									inner join podrucje b on a.podrucje= b.sifra
									where (datum_pitanja between  "2015-08-01" AND "2015-08-31") ');
				$izraz -> execute();
				$mj = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $mj->kolovoz; ?></td>
		</tr>
		
			<th>Rujan</th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as rujan from upit a 
									inner join podrucje b on a.podrucje= b.sifra
									where (datum_pitanja between  "2015-09-01" AND "2015-09-30") ');
				$izraz -> execute();
				$mj = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $mj->rujan; ?></td>
		</tr>
		
		<th>Listopad</th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as listopad from upit a 
									inner join podrucje b on a.podrucje= b.sifra
									where (datum_pitanja between  "2015-10-01" AND "2015-10-31") ');
				$izraz -> execute();
				$mj = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $mj->listopad; ?></td>
		</tr>
		
		<th>Studeni</th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as studeni from upit a 
									inner join podrucje b on a.podrucje= b.sifra
									where (datum_pitanja between  "2015-11-01" AND "2015-11-30") ');
				$izraz -> execute();
				$mj = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $mj->studeni; ?></td>
		</tr>
		
		<th>Prosinac</th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as prosinac from upit a 
									inner join podrucje b on a.podrucje= b.sifra
									where (datum_pitanja between  "2015-12-01" AND "2015-12-31") ');
				$izraz -> execute();
				$mj = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $mj->prosinac; ?></td>
		</tr>

	</tbody>
</table>
</div>


