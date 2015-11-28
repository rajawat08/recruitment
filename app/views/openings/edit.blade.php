@extends('layouts.master')

@section('title')
	Edit Opening | {{$opening->position_title}}
@stop

@section('content')

    <div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Edit
				&middot;<small>{{ link_to_route('openings.index', 'Back', null, ['class' => 'btn btn-xs btn-info']) }}</small>
				</header>
				<div class="panel-body">
					@include('openings.form', array('model' => $opening))

				</div>
			</section> 
		</div>
	</div>
	
@endsection