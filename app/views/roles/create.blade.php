@extends('layouts.master')

@section('content')

    <div class="row">
		

		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Add New
				&middot;
				<small>{{ link_to_route('roles.index', 'Back') }}</small>

				</header>
				<div class="panel-body">
					@include('roles.form')

				</div>
			</section> 
		</div>
	</div>
	
@stop
