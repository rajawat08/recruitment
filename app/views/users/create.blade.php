@extends('layouts.master')

@section('content')
	
	<h4 class="page-header">
		Add New
		&middot;
		<small>{{ link_to_route('users.index', 'Back') }}</small>
	</h4>

	<div>
		@include('users.form')
	</div>

@stop