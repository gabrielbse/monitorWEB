@extends('layouts.app')
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
@section('main-content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            @section('contentheader_title')
                <div class="pull-left">
                    <h2> <i class="far fa-bell"></i> Alertas</h2>
                </div>
            @endsection
            <br>
            <br>
            <form id="form" role="form" method="post" action="{{ route('alertas.store') }}">
              {!! csrf_field() !!}
              <div class="row">
                <div class="form-group col-md-4">
                  <strong>Informar quando a temperatura for menor que (°C): </strong>
                  <input type="number" name="limite_menor_temperatura" required value="{{ $alertas->limite_menor_temperatura }}">               
                </div>
                <div class="form-group col-md-4">
                  <strong>Informar quando a temperatura for maior que (°C): </strong>
                  <input type="number" name="limite_maior_temperatura" required value="{{ $alertas->limite_maior_temperatura }}">                 
                </div>
              </div>
              <br>
              <div class="row">
                <div class="form-group col-md-4">
                  <strong>Informar quando a umidade for menor que (%): </strong>
                  <input type="number" name="limite_menor_umidade" required value="{{ $alertas->limite_menor_umidade }}">               
                </div>
                <div class="form-group col-md-4">
                  <strong>Informar quando a umidade for maior que (%): </strong>
                  <input type="number" name="limite_maior_umidade" required value="{{ $alertas->limite_maior_umidade }}">                
                </div>                
              </div>
              <br> 
               <div class="row">
                <div class="form-group col-md-4">
                  <strong>Informar quando a pressão for menor que (Pa): </strong>
                  <input type="number" name="limite_menor_pressao" required value="{{ $alertas->limite_menor_pressao }}">               
                </div>
                <div class="form-group col-md-4">
                  <strong>Informar quando a pressão for maior que (Pa): </strong>
                  <input type="number" name="limite_maior_pressao" required value="{{ $alertas->limite_maior_pressao }}">                
                </div>
              </div>
              <br> 
               <div class="row">
                <div class="form-group col-md-4">
                  <strong>Informar quando a altitude for menor que (m): </strong>
                  <input type="number" name="limite_menor_altitude" required value="{{ $alertas->limite_menor_altitude }}">               
                </div>
                <div class="form-group col-md-4">
                  <strong>Informar quando a altitude for maior que (m): </strong>
                  <input type="number" name="limite_maior_altitude" required value="{{ $alertas->limite_maior_altitude }}">                
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-4">
                  <button type="submit" class="btn btn-action btn-success">Salvar</button>
                  <button type="reset" class="btn btn-action btn-danger">limpar</button>
                </div>               
              </div>           
            </form>
        </div>
    </div>
@endsection
