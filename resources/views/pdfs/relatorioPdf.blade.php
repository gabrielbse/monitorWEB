<style type="text/css">
    .assunto{
        font-family: arial;
        font-size: 15pt;
        height: 70px;
    }
    .conteudo{
        height: 300px;
        margin: 20px;
        font-family: arial;
        font-size: 15pt;
        text-align: justify;
    }
    .subcab {
        font-family: arial;
        font-size: 15pt;
    }
    .sub-cabe {
        height: 140px;
    }
    .assinatura{
        font-family: arial;
    }
</style>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Documento Ofício</title>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    </head>
<body>
  <div class="row">
    <div class="col-lg-3 col-xs-12" id="chart_temp" style="width: 1000px; height: 320px;"></div>
    <div class="col-lg-3 col-xs-12" id="chart_um" style="width: 1000px; height: 320px;"></div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-xs-12" id="chart_pre" style="width: 1000px; height: 320px;"></div>
    <div class="col-lg-3 col-xs-12" id="chart_alt" style="width: 1000px; height: 320px;"></div>
  </div>
</body>

<script type="text/javascript">
      google.load("visualization","1", {'packages':['corechart']});
      google.setOnLoadCallback(tempChart);
      google.setOnLoadCallback(umChart);
      google.setOnLoadCallback(altChart);
      google.setOnLoadCallback(preChart);
      function tempChart() {
        var data = google.visualization.arrayToDataTable([
          ['Momento', 'Temperatura'],
          @foreach ($temperaturas as $temperatura)
            ['{{$temperatura->date}}',{{$temperatura->temperatura}}],
          @endforeach
        ]);

        var options = {
          title: 'Temperatura (°C)',
          legend: {position: 'bottom'},
          //vAxis: {minValue: 0},
          pointSize: 5,
          colors:['green'],
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_temp'));
        chart.draw(data, options);
      }

      function umChart() {
        var data = google.visualization.arrayToDataTable([
          ['Momento', 'Umidade'],
          @foreach ($umidades as $umidade)
            ['{{$umidade->date}}',{{$umidade->umidade}}],
          @endforeach
        ]);

        var options = {
          title: 'Umidade (%)',
          legend: {position: 'bottom'},
          //vAxis: {minValue: 0},
          pointSize: 5,          
          colors:['orange'],
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_um'));
        chart.draw(data, options);
      }

      function altChart() {
        var data = google.visualization.arrayToDataTable([
          ['Momento', 'Altitude'],
          @foreach ($altitudes as $altitude)
            ['{{$altitude->date}}',{{$altitude->altitude}}],
          @endforeach
        ]);

        var options = {
          title: 'Altitude (m)',
          legend: {position: 'bottom'},
          //vAxis: {minValue: 0},
          pointSize: 5,
          colors:['blue'],
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_alt'));
        chart.draw(data, options);
      }

      function preChart() {
        var data = google.visualization.arrayToDataTable([
          ['Momento', 'Pressão'],
          @foreach ($pressaos as $pressao)
            ['{{$pressao->date}}',{{$pressao->pressao}}],
          @endforeach
        ]);

        var options = {
          title: 'Pressão (pa)',
          legend: {position: 'bottom'},
          //vAxis: {minValue: 0},
          pointSize: 5,          
          colors:['red'],
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_pre'));
        chart.draw(data, options);
      }
</script>
</html>
