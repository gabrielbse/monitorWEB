@extends('layouts.app')
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
@section('main-content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            @section('contentheader_title')
                <div class="pull-left">
                    <h3> <i class="fas fa-cogs"></i> Configurações</h3>
                </div>
            @endsection
            <br>
            <br>
            <form id="form" role="form" method="post" action="{{ route('configuracoes.store') }}">
              {!! csrf_field() !!}
              <div class="row">
                <br>
                <div class="form-group col-md-3">
                  <strong>Quantidades de registros nos gráficos: </strong>
                  <select name="intervalo_grafico" id="intervalo_grafico" class="form-control">
                    @if ($configuracoes->intervalo_grafico == 5)
                    <option value="5" selected>5 registros</option>
                    <option value="10">10 registros</option>
                    <option value="15">15 registros</option>
                    @endif
                    @if ($configuracoes->intervalo_grafico == 10)
                    <option value="5">5 registros</option>
                    <option value="10" selected>10 registros</option>
                    <option value="15">15 registros</option>
                    @endif 
                    @if ($configuracoes->intervalo_grafico == 15)
                    <option value="5">5 registros</option>
                    <option value="10">10 registros</option>
                    <option value="15" selected>15 registros</option>
                    @endif                    
                  </select>                
                </div>
                <div class="form-group col-md-3">
                  <strong>Intervalo para geração de relatório: </strong>
                  <select name="intervalo_relatorio" id="intervalo_relatorio" class="form-control">
                    @if ($configuracoes->intervalo_relatorio == 1)
                    <option value="1" selected>1 hora</option>
                    <option value="24">1 dia</option>
                    <option value="168">7 dias</option>
                    @endif
                    @if ($configuracoes->intervalo_relatorio == 24)
                    <option value="1">1 hora</option>
                    <option value="24" selected>1 dia</option>
                    <option value="168">7 dias</option>
                    @endif
                    @if ($configuracoes->intervalo_relatorio == 168)
                    <option value="1">1 hora</option>
                    <option value="24">1 dia</option>
                    <option value="168" selected>7 dias</option>
                    @endif
                  </select>               
                </div>
              </div>
              <br>
              <div class="row">
                <div class="form-group col-md-3">
                  <strong>Intervalo para coleta de dados (minutos): </strong>
                  <select name="intervalo_coleta" id="intervalo_coleta" class="form-control">
                    @if ($configuracoes->intervalo_coleta == 5)
                    <option value="5" selected>5 minutos</option>
                    <option value="10">10 minutos</option>
                    <option value="30">30 minutos</option>
                    @endif
                    @if ($configuracoes->intervalo_coleta == 10)
                    <option value="5">5 minutos</option>
                    <option value="10" selected>10 minutos</option>
                    <option value="30">30 minutos</option>
                    @endif
                    @if ($configuracoes->intervalo_coleta == 30)
                    <option value="5">5 minutos</option>
                    <option value="10">10 minutos</option>
                    <option value="30" selected>30 minutos</option>
                    @endif
                  </select>                
                </div>
                <div class="form-group col-md-3">
                  <strong>Deseja receber alertas por e-mail ?: </strong>
                  <select name="enviar_email" id="enviar_email" class="form-control">
                    @if ($configuracoes->enviar_email == true)
                    <option value="true" selected>Sim</option>
                    <option value="false">Não</option>
                    @endif
                    @if ($configuracoes->enviar_email == false)
                    <option value="true">Sim</option>
                    <option value="false" selected>Não</option>
                    @endif
                  </select>                
                </div>
              </div> 
              <div class="row">
                <div class="col-md-3 col-xs-6">
                  <button type="submit" class="btn btn-action btn-success">Salvar</button>
                </div>
                <div class="col-md-3 col-xs-6">
                  <button type="reset" class="btn btn-action btn-danger">limpar</button>
                </div>               
              </div>           
            </form>
        </div>
    </div>
@endsection