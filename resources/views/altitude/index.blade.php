@extends('layouts.app')

<script src ="{{ asset('js/jquery-3.1.0.js') }}" type = "text/javascript" ></script>
<script src ="{{ asset('js/jquery-ui-1.12.0/jquery-ui.js') }}" type = "text/javascript" ></script>
<link href="{{ asset('js/jquery-ui-themes-1.12.0/themes/base/jquery-ui.css') }}" rel="stylesheet">
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@section('main-content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            @section('contentheader_title')
                <div class="pull-left">
                    <h3> <i class="fab fa-cloudscale"></i> Altitude</h3>
                </div>
            @endsection

            <div class="pull-right">
                @permission('altitude')
                    <a class="temp btn btn-primary" title="Altitude" data-toggle="tooltip" href="{{ route('altitude.coleta') }}"><span class="glyphicon glyphicon-plus"></span> Obter Altitude</a>
                @endpermission
            </div>
            <br>
            <br>
            <div id="chart_div" style="width: 100%; height: 500px;"></div>

        </div>
    </div>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Momento', 'Altitude'],
          @foreach ($altitudes as $altitude)
            ['{{$altitude->date}}',{{$altitude->altitude}}],
          @endforeach
        ]);

        var options = {
          title: 'Altitude (m)',
          legend: {position: 'bottom'},
          pointSize: 5,
          colors:['blue'],
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
@endsection
