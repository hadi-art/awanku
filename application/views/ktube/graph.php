
<?php
list($bilall)=mysql_fetch_row(mysql_query("select count(*) from ktube_content where flag=1"));
#echo $bilall;

$sqlY= mysql_query("SELECT COUNT(*) FROM ktube_content WHERE source_id='011' AND flag='1'");
$dataY=mysql_fetch_array($sqlY);
$vle = ($dataY[0]/$bilall)*100;
$dataY[0];
$vle2 =round($vle , 4); 

#echo "<br>";
	
$sqlN= mysql_query("SELECT COUNT(*) FROM ktube_content WHERE source_id='012' AND flag='1'");
$dataN=mysql_fetch_array($sqlN);
$ytube = ($dataN[0]/$bilall)*100;
$ytube2 =round($ytube , 4); 
#echo "<br>";
	
$sqlNu= mysql_query("SELECT COUNT(*) FROM ktube_content WHERE source_id='013' AND flag='1'");
$dataNu=mysql_fetch_array($sqlNu);
$ggl = ($dataNu[0]/$bilall)*100;
$ggl2 =round($ggl , 4); 
#echo "<br>";

$sqlW= mysql_query("SELECT COUNT(*) FROM ktube_content WHERE source_id='014' AND flag='1'");
$dataW=mysql_fetch_array($sqlW);
$wiki = ($dataW[0]/$bilall)*100;
$wiki2 =round($wiki , 4); 
#echo "<br>";

$sqlOwn= mysql_query("SELECT COUNT(*) FROM ktube_content WHERE source_id='015' AND flag='1'");
$dataOwn=mysql_fetch_array($sqlOwn);
$own = ($dataOwn[0]/$bilall)*100;
$own2 =round($own , 4);
#"<br>"; 

/*$sqlE= mysql_query("SELECT COUNT(*) FROM ktube_content WHERE source_id='016' AND flag='1'");
$dataE=mysql_fetch_array($sqlE);
$etc = ($dataE[0]/$bilall)*100;
echo $etc2 =round($etc , 2); 
echo "<br>";*/

$etc2=100-($vle2 + $ytube2 + $ggl2 + $wiki2 + $own2);
?>



<script type="text/javascript" src="<?php echo $base; ?>include/js/ajxx.js"></script>

<script type="text/javascript">

$(function () {



//if (selection.length > 0) {...}





Highcharts.setOptions({
 colors: ['blue', 'red', 'grey','green','yellow','brown','#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#01A9DB','#FFFF00','#AC58FA']
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
                text: 'Overal resource performances'
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
                    ['VLE',   <?php echo $vle2; ?>],
                    ['YOUTUBE',       <?php echo $ytube2; ?>],
                    ['GOOGLE',   <?php echo $ggl2; ?>],
					['WIKIPEDIA',   <?php echo $wiki2; ?>],
					['OWN',   <?php echo $own2; ?>],
					['etc',   <?php echo $etc2; ?>]
                ]
            }]
        });
    });
    
});
		


		</script>

        



<script src="<?php echo $base ?>template/js/highcharts.js"></script>
<script src="<?php echo $base ?>template/js/modules/exporting.js"></script>

<div id="container" style="width: 600px; height: 500px; margin: 0 auto"></div>





