@extends('layouts.master')

@section('title')
    Clients
@stop

@section('content')
	
	<div class="row">
				
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Accounts ({{ $clients->getTotal() }})
		&middot;
		<small>{{ link_to_route('clients.create', 'Add New',null, ['class' => 'btn btn-info btn-xs']) }}</small>
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                  <thead>
                                  <tr>                                     
                                      <th>Account Name</th>                                      
                                      <th >Email</th>
                                      <th >Document</th>
                                      <th >Type</th>
                                      <th >Revenue Type</th>
                                      <th >Status</th>
                                      <th >Industry</th>
                                      <th >Added By</th>
                                      <th >Added At</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                 @foreach ($clients as $client)
								<tr>
									
									<td><a title="view client details" href="{{ route('clients.show', $client->id) }}">{{ $client->account_name }}</a></td>
									
									<td>{{ $client->email }}</td>
									<td>{{ $client->contract_path != "" ? HTML::link($fullPath."/".$client->contract_path,'contract',['target' => '_blank']) :'N/A' }}</td>
                  <td>{{ $client->account_type }}</td>
                  <td>{{ $client->revenue_type }}</td>
                  <td>{{ ucfirst($client->status) }}</td>
                  <td>{{ isset($industry[$client->industry]) ? $industry[$client->industry] : $client->industry; }}</td>
                  <td>{{ $client->user->name }}</td>
									<td>{{ $client->created_at }}</td>
									<td class="text-center">
										<a href="{{ route('clients.edit', $client->id) }}">Edit</a>
										&middot;
										@if(Auth::user()->getRole()->name == 'Administrator')
										@include('partials.modal', ['data' => $client, 'name' => 'clients'])
										@endif
									</td>
								</tr>
		
			@endforeach
                                  
                                 
                                  </tbody>
                              </table>
                              <div class="text-center">
    {{ pagination_links($clients) }}
  </div> 
                              </section>
                          </div>
                      </section>
                  </div>
              </div>
	  
@endsection