@extends('layouts.master')

@section('title')
	Edit Candidate | {{$candidate->first_name." ".$candidate->last_name}}
@stop
@section('content')

    <div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Edit
				&middot;<small>{{ link_to_route('candidates.index', 'Back',null,['class' => 'btn btn-info btn-xs']) }}</small>
				</header>
				<div class="panel-body">
					@include('candidates.form', array('model' => $candidate))

				</div>
			</section> 
		</div>
	</div>
	
@endsection