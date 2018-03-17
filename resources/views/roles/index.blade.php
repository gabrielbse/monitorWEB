@extends('layouts.app')

<script src ="{{ asset('js/jquery-3.1.0.js') }}" type = "text/javascript" ></script>
<script src ="{{ asset('js/jquery.maskedinput.js') }}" type = "text/javascript" ></script>
<script src ="{{ asset('js/jquery-ui-1.12.0/jquery-ui.js') }}" type = "text/javascript" ></script>
<link href="{{ asset('js/jquery-ui-themes-1.12.0/themes/base/jquery-ui.css') }}" rel="stylesheet">
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>

<!-- SCRIPT Geral -->
<script src="{{ asset('js/roles/roles.js') }}"></script>

@section('main-content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			@section('contentheader_title')
			<div class="pull-left">
				<h2><i class="fa fa-tasks"></i> Tipos de Usuário</h2>
			</div>
			@endsection
			
		</div>
	</div>
@role('Administrador')
<br>
	<div class="box">
		<div class="box-body">
			<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
				
			   <thead>
					<tr>
						 <th>No</th>
						 <th>Nome</th>
						 <th>Descrição</th>
						 <th>Ação</th>
					 </tr>
				</thead>				 
			</table>
		</div>
	</div>

	<!-- Modal Visualizar Usuário -->
	@include('roles.visualizar')
	<!-- Fim Modal Visualizar -->
@endrole
@endsection
