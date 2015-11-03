@extends('layouts.master')

@section('content')
	<section id="main-content">
              <section class=" wrapper wrapper_start">
              	 @include('partials.flashes')
                 

	
	<div class="row">
				<div class="col-lg-2">
					<section class="panel">
					 <header class="panel-heading">
		
		<small>{{ link_to_route('users.create', 'Add New') }}</small>
	
	</header>
	</section>

				</div>
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                              All Users ({{ $users->getTotal() }})
		&middot;
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                  <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Name</th>
                                      <th >Username</th>
                                      <th >Role</th>
                                      <th >Email</th>
                                      <th >Created At</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                 @foreach ($users as $user)
								<tr>
									<td>{{ $no }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->username }}</td>
									<td>{{ $user->getRole() ? $user->getRole()->name : 'Unknow' }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->created_at }}</td>
									<td class="text-center">
										<a href="{{ route('users.edit', $user->id) }}">Edit</a>
										&middot;
										@if($user->getRole()->name != 'Administrator')
										@include('partials.modal', ['data' => $user, 'name' => 'users'])
										@endif
									</td>
								</tr>
			<?php $no++ ;?>
			@endforeach
                                  
                                 
                                  </tbody>
                              </table>
                              </section>
                          </div>
                      </section>
                  </div>
              </div>
	<div class="text-center">
		{{ pagination_links($users) }}
	</div>
              </section>
          </section>
	
@stop