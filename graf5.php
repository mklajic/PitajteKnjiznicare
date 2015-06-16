$(function () {
    $('#container5').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Broj poslanih upita po studijima'
        },
        
        xAxis: {
        	
            categories: [
            <?php 
            $izraz = $veza -> prepare("select sifra, naziv from studij");
			$izraz -> execute();
			$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
			foreach ($rezultati as $s) :
            
            echo " ' " .  $s->naziv . "',   " ;
            
            
            endforeach; ?> ] ,
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Br. upita',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
      
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Godina 2015.',
            data: [<?php 

            $izraz = $veza -> prepare("select sifra, naziv from studij");
			$izraz -> execute();
			$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
			foreach ($rezultati as $s) :
            
 
            $izraz = $veza -> prepare("select count(a.sifra) as ukupno, b.naziv from
									student a inner join studij b on a.studij=b.sifra
									where a.studij=:sifra");
			$izraz->bindParam("sifra", $s->sifra);
			$izraz -> execute();
			$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
			foreach ($rezultati as $o) :
            
            echo $o->ukupno . "," ;
            
            
            endforeach; 
            endforeach;?>]
        }]
    });
});