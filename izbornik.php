
			
	
<nav  class="top-bar" data-topbar role="navigation" >


  <section  class="top-bar-section">
 
    <ul >
   

      <li><a href="<?php echo $putanja; ?>index.php">Početak</a></li>

      <li><a href="<?php echo $putanja; ?>podrucja.php"> Odgovori </a></li>

      <li><a href="<?php echo $putanja; ?>posaljiUpit.php">  Pošalji upit  </a></li>
      
      <li><a href="<?php echo $putanja; ?>statistika.php">Statistika</a></li>
 	  
 
     <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$ADMINISTRATOR): ?>
      	
      	<li><a href="<?php echo $putanja; ?>privatno/nadzornaPloca.php">  Nadzorna ploča  </a></li>
      	
      	
     
      <?php endif; ?>
      
      <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$KORISNIK): ?>
      	
      	<li><a href="<?php echo $putanja; ?>privatno/pregledUpita/index.php">  Zaprimljeni upiti  </a></li>
     
      <?php endif; ?>
      
      
      <?php if(isset($_SESSION[$ida . "operater"]) && $_SESSION[$ida . "operater"]->uloga==Uloga::$KORISNIK): ?>
      	
      	<li><a href="<?php echo $putanja; ?>privatno/operateri/promjenaLozinke.php">  Promjena lozinke</a></li>
     
      <?php endif; ?>

    </ul>
  </section>
</nav>
		
		</div>
	</div>	