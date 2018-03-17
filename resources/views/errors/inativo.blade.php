@extends('layouts.app')
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
@section('htmlheader_title')
	ERROR
@endsection

@section('contentheader_title')
    
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')

<div class="error-page">
    <div class="error-content">
        <h2 class="text-red"><i class="fa fa-warning text-red"></i> Usuário Inativo!</h2>
        <p>
            Você está inativo no sistema. Para mais informações, contate o administrador do sistema.
        </p>
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection