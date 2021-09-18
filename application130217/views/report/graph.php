
<?php
list($bilall)=mysql_fetch_row(mysql_query("select count(*) from logs where flag=1"));
#echo $bilall;

$sqlY= mysql_query("SELECT COUNT(*) FROM logs WHERE level_id='1' AND flag='1'");
$dataY=mysql_fetch_array($sqlY);
$g = ($dataY[0]/$bilall)*100;
$dataY[0];
$guru =round($g,2); 

#echo "<br>";
	
$sqlN= mysql_query("SELECT COUNT(*) FROM logs WHERE level_id='2' AND flag='1'");
$dataN=mysql_fetch_array($sqlN);
$p = ($dataN[0]/$bilall)*100;
$pelajar =round($p,2); 
#echo "<br>";
	
//$etc2=100-($guru + $pelajar);
?>



<script type="text/javascript" src="<?php echo $base; ?>include/js/ajxx.js"></script>

<script type="text/javascript">

$(function () {



//if (selection.length > 0) {...}





Highcharts.setOptions({
 colors: ['green','red','blue','grey','yellow','brown', '#24CBE5', '#FFF263', '#64E572', '#FF9655', '#6AF9C4','#01A9DB','#FFFF00','#AC58FA']
});





    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Overal AWANKU performances'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'All Content',
                data: [
                    ['GURU',   <?php echo $guru; ?>],
                    ['PELAJAR',       <?php echo $pelajar; ?>],
                 
                ]
            }]
        });
    });
    
});

		</script>

<script src="<?php echo $base ?>template/js/highcharts.js"></script>
<script src="<?php echo $base ?>template/js/modules/exporting.js"></script>

<div id="container" style="width: 600px; height: 500px; margin: 0 auto"></div>





