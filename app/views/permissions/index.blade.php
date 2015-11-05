@extends('layouts.master')

@section('content')

		 <div class="row">
	
	<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			All Roles ({{ $permissions->getTotal() }})
		&middot;
		<small>{{ link_to_route('permissions.create', 'Add New') }}</small>
		</header>
		<div class="panel-body">
        <section id="unseen">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                  <tr>
                      <th>No</th>
						<th>Name</th>
						<th>Alias</th>
						<th>Description</th>
						<th>Created At</th>
                      <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach ($permissions as $permission)
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $permission->name }}</td>
						<td>{{ $permission->slug }}</td>
						<td>{{ $permission->description }}</td>
						<td>{{ $permission->created_at }}</td>
						<td class="text-center">
							<a href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
							&middot;
							@include('partials.modal', ['data' => $permission, 'name' => 'permissions'])
						</td>
					</tr>
					<?php $no++ ;?>
					@endforeach

                </tbody>
            </table>
            <div class="text-center">
				{{ pagination_links($permissions) }}
			</div>
        </section>
    	</div>
	</section>
	</div>

</div>


@stop
