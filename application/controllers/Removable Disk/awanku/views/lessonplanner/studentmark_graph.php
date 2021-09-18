<?php
list($lima)=mysql_fetch_row(mysql_query("select count(*) from elearning_history where title_id='$_GET[cid]' and class_id='$_GET[classid]' and prestasi='5'"));
list($empat)=mysql_fetch_row(mysql_query("select count(*) from elearning_history where title_id='$_GET[cid]' and class_id='$_GET[classid]' and prestasi='4'"));
list($tiga)=mysql_fetch_row(mysql_query("select count(*) from elearning_history where title_id='$_GET[cid]' and class_id='$_GET[classid]' and prestasi='3'"));
list($dua)=mysql_fetch_row(mysql_query("select count(*) from elearning_history where title_id='$_GET[cid]' and class_id='$_GET[classid]' and prestasi='2'"));
list($satu)=mysql_fetch_row(mysql_query("select count(*) from elearning_history where title_id='$_GET[cid]' and class_id='$_GET[classid]' and prestasi='1'"));
list($dahjawab)=mysql_fetch_row(mysql_query("select count(*) from elearning_history where title_id='$_GET[cid]' and class_id='$_GET[classid]'"));
$xjawab=$jumlahstudent-$dahjawab;
#echo $jumlahstudent;

#echo $lima;

#die();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Student Mark</title>

		<script type="text/javascript" src="<?php echo $base; ?>include/js/ajxx.js"></script>
		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
    
        var colors = Highcharts.getOptions().colors,
            categories = ['Sangat Baik<br>(80-100)', 'Baik<br>(60-79.99)', 'Memuaskan<br>(40-59.99)', 'Kurang Memuaskan<br>(20-39.99)', 'Gagal<br>(0-19.99)', 'Tidak Menjawab'],
            name = 'Prestasi Pelajar',
            data = [{
                    y: <?php echo $lima; ?>,
                    color: 'green',
                    
                }, {
                    y: <?php echo $empat; ?>,
                    color: colors[9],
                   
                }, {
                    y: <?php echo $tiga; ?>,
                    color: 'blue',
                    
                }, {
                    y: <?php echo $dua; ?>,
                    color: colors[6],
                    
                }, {
                    y: <?php echo $satu; ?>,
                    color: 'red',
                    
                },
				
				 {
                    y: <?php echo $xjawab; ?>,
                    color: colors[5],
                    
                }];
    
        function setChart(name, categories, data, color) {
			chart.xAxis[0].setCategories(categories, false);
			chart.series[0].remove(false);
			chart.addSeries({
				name: name,
				data: data,
				color: color || 'white'
			}, false);
			chart.redraw();
        }
    
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Prestasi Kuiz'
            },
            subtitle: {
                text: '-'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Jumlah Prestasi'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +' Pelajar';
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                        s = this.x +':<b>'+ this.y +' Pelajar</b><br/>';
                    if (point.drilldown) {
                        s += 'Click to view '+ point.category +' versions';
                    } else {
                        s += '';
                    }
                    return s;
                }
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        });
    });
    
});
		</script>
	</head>
	<body>
<script src="<?php echo $base ?>template/js/highcharts.js"></script>
<script src="<?php echo $base ?>template/js/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
