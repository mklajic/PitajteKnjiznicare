<?php include_once 'konfiguracija.php'; ?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once 'head.php'; ?>
    
  </head>
  <body>
   	<?php include_once 'zaglavlje.php'; ?>
	<?php include_once 'izbornik.php'; ?>
    
   
    	
	<div class="row hidden-for-small-only">
		
    	
    	
    	<div class="large-2 columns ikonice" align="center">
    		<a href="<?php echo $putanja ?>img/odgovori.png" " data-reveal-id="myModal"><b>  <img src="img/opcenito.png" alt="" <title>Općenito o usluzi </title> </b></a>
<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h4 id="modalTitle">Općenito o usluzi</h4>
 Usluga Pitajte knjižničare Knjižnice Filozofskog fakulteta Osijek je online informacijsko-referalna usluga namijenjena studentima Filozofskog fakulteta u Osijeku, a prvenstveno služi 
u svrhu pronalaženja odgovarajućih izvora literature za seminarske, završne, diplomske i 
doktorske radove te u druge svrhe. <br/>

Na upite odgovaraju knjižničari pretraživanjem knjižničnih kataloga, lokalne baze podataka i 
drugih izvora informacija te elektroničkih baza podataka kod nas i u svijetu. </br>
 Usluga je ograničena isključivo na korisnike službene mail-adrese 
Filozofskog fakulteta u Osijeku <b><i>"@ffos.hr". </i></b>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div></a> </a> 
    		
    	</div>
    	
    		<div class="large-2 columns ikonice">
    		
    		<img src="img/arrow.png" alt="" />
    		
    	</div>
    	
    			<div class="large-2 columns ikonice" align="center">
    		<a href="<?php echo $putanja ?>img/odgovori.png" " data-reveal-id="myModal2"><b>  <img src="img/vazno.png" alt="" <title> Važne napomene </title> </b></a>
<div id="myModal2" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h4 id="modalTitle">Važne napomene</h4>
</b>Osobni podaci, kao i mail-adresa navedeni u upitu koristit će se isključivo 
u svrhu odgovaranja na upit i neće biti javno dostupni. <br/>

Usluga je dostupna 24 sata na dan, a odgovor se šalje u što kraćem roku putem elektronske pošte. <br/>

Knjižnica u odgovorima na upite ne dostavlja skeniranu građu, već 
isključivo izvore na određenu literaturu dostupnu online ili fizički u Knjižnici. <br/>

Korisnici se Knjižnice Filozofskog fakulteta u Osijeku za sve dodatne informacije o usluzi Pitajte knjižničare mogu obratiti na adresu: <a href="mailto:mklajic@ffos.hr?subject=feedback"><b> mklajic@ffos.hr</b></a>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div></a> </a> </div>

    		<div class="large-2 columns ikonice">
    		
    		<img src="img/arrow.png" alt="" />
    	</div>
    	
    	
    		<div class="large-2 columns ikonice" align="center">
    		<a href="<?php echo $putanja ?>img/odgovori.png" " data-reveal-id="myModal3"><b>  <img src="img/koraci1.png" alt="" <title>Koraci korištenja usluge</title> </b></a>
<div id="myModal3" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h4 id="modalTitle">Koraci korištenja usluge</h4> </b>

<ol>
	<li> Za početak pretražite bazu odgovorenih upita na poveznici <a target="_blank" href="<?php echo $putanja; ?>podrucja.php"> <b> Odgovori </b> </a> kako biste provjerili ako je 
sličan upit već postavljen i odgovoren.</li>
	<li>
	 Nakon što ste ušli u željeno područje imate mogućnost <b> <a target="_blank" href="<?php echo $putanja; ?>odgovori.php?sifra=5"> pretražiti </b></a> odgovore prema riječima iz naslova.

</li>	

	<li>
		 <b><a target="_blank" href="<?php echo $putanja; ?>odgovorVise.php?sifra=44">   Pregled </b> </a>  odabranog odgovora.
  
	</li>
	<li>
		Ukoliko niste pronašli sličan upit, novi upit možete postaviti pomoću online obrasca na poveznici <a target="_blank" href="<?php echo $putanja; ?>posaljiUpit.php"> <b> Pošalji upit </b> </a>.

	</li>
	<li>
		O odgovoru na upit koji ste poslali bit ćete obavješteni putem elektronske pošte. 
	</li>
</ol>  


</a> <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div></a> </a> </div>
    	
    	
</div>
    </div>
  </div>
     
    <?php include_once 'podnozje.php'; ?>
    <?php include_once 'skripte.php'; ?>

    
  </body>
</html>
