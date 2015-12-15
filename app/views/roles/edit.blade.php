@extends('layouts.master')
@section('title')
   Edit Role
@stop
@section('content')

    <div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Edit
				&middot;
				<small>{{ link_to_route('roles.index', 'Back',null,['class' => 'btn btn-info btn-xs']) }}</small>
				</header>
				<div class="panel-body">
					@include('roles.form', array('model' => $role) + compact('permission_role'))

				</div>
			</section> 
		</div>
	</div>

@stop

	