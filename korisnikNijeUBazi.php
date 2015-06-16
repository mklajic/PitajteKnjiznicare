<?php
$veza -> beginTransaction();

		//insert u tablicu student
		$izraz = $veza -> prepare("insert into student(ime, prezime, email, studij) values 
													(:ime, :prezime, :email, :studij)");
		$izraz->bindParam("ime", $_POST["ime"]);
		$izraz->bindParam("prezime", $_POST["prezime"]);
		$izraz->bindParam("email", $_POST["email"]);
		$izraz->bindParam("studij", $_POST["studij"], PDO::PARAM_INT);
		$izraz->execute();
		
		$sifraStudenta=$veza->lastInsertId();
		
		//insert u tablicu godina_student
		$izraz = $veza -> prepare("insert into godina_student(godina, student) values 
													(:godina, :student)");
		$izraz->bindParam("godina", $_POST["godina"], PDO::PARAM_INT);
		$izraz->bindParam("student", $sifraStudenta);
		$izraz->execute();
		
		$sifraGodinaStudent=$veza->lastInsertId();
		
		//insert u tablicu upit
		$izraz = $veza -> prepare("insert into upit(godina_student, kolegij, podrucje, pitanje, datum_pitanja) values 
												    (:godina_student, :kolegij, :podrucje, :pitanje, :datum_pitanja )");
		$izraz->bindParam("godina_student", $sifraGodinaStudent);
		$izraz->bindParam("kolegij", $_POST["kolegij"]);
		$izraz->bindParam("podrucje", $_POST["podrucje"], PDO::PARAM_INT);
		$izraz->bindParam("pitanje", $_POST["pitanje"]);
		$izraz->bindParam("datum_pitanja", $_POST["datum_pitanja"]);
		$izraz->execute();
		
		 $sifraUpit=$veza->lastInsertId();
 		
		//insert u tablicu upit_jezik
		 foreach($_POST["jezici"] as $j):
			echo $j;
			 echo "<br/>";
			 $izraz = $veza -> prepare("insert into upit_jezik(upit, jezik) values (:upit, :jezik)");
			 $izraz->bindParam("upit", $sifraUpit);
			 $izraz->bindParam("jezik", $j);
			 $izraz-> execute();
			 endforeach;
		
		$izraz = $veza -> prepare("select naziv from podrucje where podrucje=:sifra");
				$izraz -> execute();
				$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);	 
			 	
			 
		$to      = 'majaklajic@gmail.com' ;
		$subject = 'Novi upit iz područja: ' . $_POST["podrucje"] . '';
		$message = $_POST["pitanje"] ;
		$headers = 'From: pitajte.knjiznicare@ffos.hr' . "\r\n" .
		   			'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);
		
		$veza -> commit();
		
		header("location: index.php");