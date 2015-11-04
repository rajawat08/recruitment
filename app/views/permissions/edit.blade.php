@extends('layouts.master')

@section('content')
<section id="main-content">
    <section class=" wrapper wrapper_start">
	@include('partials.flashes')
    <div class="row">
		<div class="col-lg-2">
			<section class="panel">
				<header class="panel-heading">				
				<small>{{ link_to_route('permissions.index', 'Back') }}</small>

				</header>
			</section> 
		</div>

		<div class="col-lg-6">
			<section class="panel">
				<header class="panel-heading">
				Edit
				&middot;
				</header>
				<div class="panel-body">
					@include('permissions.form', array('model' => $permission))

				</div>
			</section> 
		</div>
	</div>
	
	</section>
	</section>
@stop
