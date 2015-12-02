@extends('layouts.master')

@section('title')
    All Candidates
@stop

@section('content')
	
	<div class="row">
				
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Candidates ({{ $candidates->getTotal() }})
		&middot;
		<small>{{ link_to_route('candidates.create', 'Add New',null,['class' => 'btn btn-xs btn-info']) }}</small>
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
                                 @foreach ($candidates as $candidate)
								<tr>
									<td>{{ $no }}</td>
									<td>{{ $candidate->name }}</td>
									<td>{{ $candidate->username }}</td>
									<td>{{ $candidate->getRole() ? $candidate->getRole()->name : 'Unknow' }}</td>
									<td>{{ $candidate->email }}</td>
									<td>{{ $candidate->created_at }}</td>
									<td class="text-center">
										<a href="{{ route('candidates.edit', $candidate->id) }}">Edit</a>
										&middot;
										@if($candidate->getRole()->name != 'Administrator')
										@include('partials.modal', ['data' => $candidate, 'name' => 'candidates'])
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
		{{ pagination_links($candidates) }}
	</div>   
@endsection