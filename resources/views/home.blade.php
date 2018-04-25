@extends('layouts.app')

<script src ="{{ asset('js/jquery-3.1.0.js') }}" type = "text/javascript" ></script>
<script src ="{{ asset('js/jquery-ui-1.12.0/jquery-ui.js') }}" type = "text/javascript" ></script>
<link href="{{ asset('js/jquery-ui-themes-1.12.0/themes/base/jquery-ui.css') }}" rel="stylesheet">
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

@section('htmlheader_title', 'Início')

@section('main-content')

@section('contentheader_title')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2><i class="fa fa-home"></i> Início</h2>            
        </div>
        @endsection
    </div>
</div>
@endsection

@section('main-content')
<br>
<br>
<br>
<div class="row">
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$temperatura}}</h3>

                <p>°C</p><br>
            </div>
            <br>
            <div class="icon">
                <p>&nbsp;</p>
                <i class="fas fa-thermometer-quarter"></i>
                
            </div>
            <a href="{{route('temperatura.index')}}" class="small-box-footer">
                Mais informações <i class="fa fa-arrow-circle-right"></i>   
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{$umidade}}</h3>

                <p>%</p><br>
            </div>
            <br>
            <div class="icon">
                <p>&nbsp;</p>
                <i class="fab fa-cloudversify"></i>
            </div>
            <a href="{{route('umidade.index')}}" class="small-box-footer">
                Mais informações <i class="fa fa-arrow-circle-right"></i>   
            </a>
        </div>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$altitude}}</h3>

                <p>m</p><br>
            </div>
            <br>

            <div class="icon">              
                <p>&nbsp;</p>
                <i class="fab fa-cloudscale"></i>
            </div>
            <a href="{{route('altitude.index')}}" class="small-box-footer">
                Mais informações <i class="fa fa-arrow-circle-right"></i>   
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$pressao}}</h3>

                <p>pa</p><br>
            </div>
            <br>

            <div class="icon">              
                <p>&nbsp;</p>
                <i class="fas fa-tachometer-alt"></i>
            </div>
            <a href="{{route('pressao.index')}}" class="small-box-footer">
                Mais informações <i class="fa fa-arrow-circle-right"></i>   
            </a>
        </div>
    </div>
</div>

@endsection