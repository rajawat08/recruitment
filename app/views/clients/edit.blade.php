@extends('layouts.master')

@section('title')
   Edit Clients
@stop

@section('content')

    <div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Edit
				&middot;<small>{{ link_to_route('clients.index', 'Back',null,['class' => 'btn btn-info btn-xs']) }}</small>
				</header>
				<div class="panel-body">
					@include('clients.form', array('model' => $client))

				</div>
			</section> 
		</div>
	</div>
	
@endsection