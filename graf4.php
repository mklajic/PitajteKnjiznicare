$(function () {
    $('#container4').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Udio upita po godinama'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'udio',
            data: [
            <?php 
            $izraz = $veza -> prepare("select sifra, naziv from godina");
			$izraz -> execute();
			$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
			foreach ($rezultati as $g) :
            
            
            $izraz = $veza -> prepare("select count(a.sifra) as ukupno, b.naziv from
			godina_student a inner join godina b on a.godina=b.sifra
			where a.godina=:sifra");
			$izraz->bindParam("sifra", $g->sifra);
			$izraz -> execute();
			$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
			foreach ($rezultati as $o) :
				echo " ['" .  $o->naziv . "',   " . $o->ukupno .  "],";
				endforeach;
            endforeach;
            ?>
            
            ]
        }]
    });
});
	
</script>

<script>
	
	Highcharts.createElement('link', {
   href: '//fonts.googleapis.com/css?family=Arial:400,600',
   rel: 'stylesheet',
   type: 'text/css'
}, null, document.getElementsByTagName('head')[0]);

Highcharts.theme = {
   colors: ["#F08A24", "#555555", "#008CBA", "#3A945B", "#A72821",   "#BA55D3 ", "#4682B4 ",
      "#708090  ", "#DF5353", "#7798BF", "#aaeeee"],
   chart: {
      backgroundColor: null,
      style: {
    	fontFamily: "Arial"
      }
   },
   title: {
      style: {
         fontSize: '16px',
         fontWeight: 'bold',
        
      }
   },
   tooltip: {
      borderWidth: 0,
      backgroundColor: 'rgba(219,219,216,0.8)',
      shadow: false
   },
   legend: {
      itemStyle: {
         fontWeight: 'bold',
         fontSize: '13px'
      }
   },
   xAxis: {
      gridLineWidth: 1,
      labels: {
         style: {
            fontSize: '12px'
         }
      }
   },
   yAxis: {
      minorTickInterval: 'auto',
      title: {
         style: {
            
         }
      },
      labels: {
         style: {
            fontSize: '12px'
         }
      }
   },
   plotOptions: {
      candlestick: {
         lineColor: '#404048'
      }
   },


   // General
   background2: '#F0F0EA'
   
};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);