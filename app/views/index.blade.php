@extends('layouts.master')

@section('content')

<h3 class="page-header admin-header">Hello, {{ Auth::user()->name }}.</h3>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-admin">
			<div class="panel-heading">
				Users
			</div>
			<table class="table">
				<tr>
					<td>All Users</td>
					<td>{{ User::count() }}</td>
				</tr>
				@foreach(Role::all() as $role)
				<tr>
					<td>{{ Str::plural($role->name) }}</td>
					<td>{{ User::hasRole($role->slug)->count() }}</td>
				</tr>
				@endforeach
			</table>
		</div>

	</div>
	<div class="col-md-6">
		<div class="panel panel-admin">
			<div class="panel-heading">
				Visitors
			</div>
			<table class="table">
				<tr>
					<th>Total Hits</th>
					
				</tr>
				<tr>
					<th>Page Hits Today </th>
					
				</tr>
				<tr>
					<th>Online Users</th>
					
				</tr>
				<tr>
					<th>Total Visitors Today</th>
					
				</tr>
			</table>
		</div>

	</div>
	
</div>

@endsection

@section('style')
<style type="text/css">
	td{
		widtd:50px;
	}
	td{
		text-indent: 10px;
	}
</style>
@stop