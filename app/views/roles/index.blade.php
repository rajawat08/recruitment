@extends('layouts.master')
@section('title')
   All Roles
@stop
@section('content')

<div class="row">
	<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			All Roles ({{ $roles->getTotal() }})
		&middot;
		<small>{{ link_to_route('roles.create', 'Add New',null,['class' => 'btn btn-info btn-xs']) }}</small>
		</header>
		<div class="panel-body">
        <section id="unseen">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th >Alias</th>
                      <th >Description</th>
                      <th >Permissions</th>
                      <th >Created At</th>
                      <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach ($roles as $role)
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $role->name }}</td>
						<td>{{ $role->slug }}</td>
						<td>{{ $role->description }}</td>
						<td>
							@foreach($role->permissions as $permission)
								&bullet; {{ $permission->name }}<br>
							@endforeach
						</td>
						<td>{{ $role->created_at }}</td>
						<td class="text-center">
							
							@include('roles.modal', ['data' => $role, 'name' => 'roles'])
							&middot;
							@include('partials.modal', ['data' => $role, 'name' => 'roles'])
						</td>
					</tr>
					<?php $no++ ;?>
					@endforeach

                </tbody>
            </table>
            <div class="text-center">
				{{ pagination_links($roles) }}
			</div>
        </section>
    	</div>
	</section>
	</div>

</div>
@endsection