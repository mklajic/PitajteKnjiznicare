<div class="large-3 columns" >
<table id="datatable2" class="hidden-for-xxlarge-down" >
	<thead>
		<tr>
			<th>Područje</th>
			<th>Br. upita</th>
			
		</tr>
	</thead>
	<tbody>
		<?php
				$izraz = $veza -> prepare("select sifra, naziv from podrucje group by naziv");
				$izraz -> execute();
				$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
				foreach($rezultati as $o): ?>
			
		<tr>
			<th><?php echo $o->naziv; ?></th>
			<?php 
			$izraz=$veza -> prepare('select count(a.pitanje) as info from upit a 
							inner join podrucje b on a.podrucje= b.sifra
							where b.sifra=:sifra');
							$izraz->bindParam("sifra", $o->sifra);
				$izraz -> execute();
				$podr = $izraz -> fetch(PDO::FETCH_OBJ);
			?>
			
			<td><?php echo $podr->info; ?></td>
			<?php endforeach ?>

	</tbody>
</table>	
</div> 

