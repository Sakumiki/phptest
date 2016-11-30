<?php
require_once __DIR__ . '/func.php';
require_unlogined_session();
$conn = pg_connect("dbname=db_3836 user=d33836 host=192.168.109.210");
$bango = $_SESSION['id'];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Highcharts Example</title>

<link rel="stylesheet" type="text/css" href="./assets/resultstyle.css">
<link rel="stylesheet" type="text/css" href="./assets/button.css">

<script src="./graph/highcharts.js"></script>
<script src="./graph/exporting.js"></script>
<script src="./graph/grid-light.js"></script>

<script src="./graph/graph.js"></script>

<script type="text/javascript" src="./assets/jquery1.8.2.min.js"></script>
<style type="text/css">
${demo.css}
</style>
<script type="text/javascript">
$(function(){
   $('#container').hoge();
});
</script>
</head>
<body>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<script>
window.onload = function() {
    // Build the chart
    Highcharts.chart(this, {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Browser market shares January, 2015 to May, 2015'
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: false
          },
          showInLegend: true
        }
      },
      series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
          name: 'Microsoft Internet Explorer',
          y: 56.33
        }, {
          name: 'Chrome',
          y: 24.03,
          sliced: true,
          selected: true
        }, {
          name: 'Firefox',
          y: 10.38
        }, {
          name: 'Safari',
          y: 4.77
        }, {
          name: 'Opera',
          y: 0.91
        }, {
          name: 'Proprietary or Undetectable',
          y: 0.2
        }]
      }]
    });

  };
};
</script>
</body>
</html>
