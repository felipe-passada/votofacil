<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<title>Urna - Classificação</title>

<link rel="stylesheet" type="text/css" href="css_admin/estilo.css"/>
<link rel="stylesheet" type="text/css" href="css_admin/reset.min.css">

<!-- SCRIPTS PARA FUNCIONAR O GRAFICO -->
<script type="text/javascript" href="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js" > </script>
<script type="text/javascript" href="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" > </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

</head>
<body>

<?php include("header/menu_admin.php");?>

<div id="estrutura">
<div id="content">

<?php
    $SQL1 = "SELECT * FROM eleicao";

	$result1 = mysqli_query($con, $SQL1);
	$data = array();
	while ($row = mysqli_fetch_array($result1)) {
	   $data[] = array($row['nome'], hexdec($row['votos']));
	}

    $jSon = json_encode($data);
?>



<script type="text/javascript">
$(function () {
    $('#graficoPizza').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Gráfico dos Votos'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Quantidade enviados',
            data: <?php echo $jSon;?>
        }]
    });
});     
</script>
	
<br><br>
<div id="graficoPizza" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

</div>
</div>
</body>
</html>