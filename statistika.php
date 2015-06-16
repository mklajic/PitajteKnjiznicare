<?php include_once 'konfiguracija.php'; ?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <?php include_once 'head.php'; ?>
    
  </head>
  <body>
   	<?php include_once 'zaglavlje.php'; ?>
	<?php include_once 'izbornik.php'; ?>
    
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 10px;"></div>
<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 10px;"></div>


<div>
<div class="large-6 columns">
<div id="container3" style="height: 400px"></div>
</div>

<div class="large-6 columns">
<div id="container4" style="height: 400px"></div>
</div>

<div class="middle" id="container5" style="min-width: 310px; max-width: 1000px; height: 700px;  margin-top: 10px; margin-bottom: 400px; margin-left: 250px"></div>

</div>



<?php include_once 'graf1.php'; ?> 

<?php include_once 'graf2.php'; ?>



     
    <?php include_once 'podnozje.php'; ?>
    <?php include_once 'skripte.php'; ?>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/data.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="http://code.highcharts.com/highcharts-3d.js"></script>




<script>
	
	<?php include_once 'graf3.php'; ?>
	
</script>

<script>
	
	<?php include_once 'graf4.php'; ?>
	
</script>

<script>
	
	
	
	$(function () {
    $('#container').highcharts({
        data: {
            table: 'datatable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Broj poslanih upita u 2015. godini'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Broj upita'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
});
	
	
</script>

<script>
	
	
	
	$(function () {
    $('#container2').highcharts({
        data: {
            table: 'datatable2'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Broj poslanih upita po područjima'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Broj upita'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
});
	
	
</script>

<script>
	
	<?php include_once 'graf5.php'; ?>
	
</script>

    
  </body>
</html>
