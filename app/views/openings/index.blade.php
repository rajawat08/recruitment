@extends('layouts.master')

@section('title')
  All Openings 
@stop

@section('content')
	
	<div class="row">
				
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Openings ({{ $openings->getTotal() }})
		&middot;
		{{ link_to_route('openings.create', 'Add New',null, ['class' => 'btn btn-info btn-xs']) }}
   <!--  <a href="javascript:;" class="btn btn-info btn-xs" onclick="convertToClient()" > Convert To Client </a>  -->   
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <table id="leads" class="table table-bordered table-striped table-condensed">
                                  <thead>
                                  <tr>
                                                                      
                                      <th>Position Title</th>
                                      <th >Client</th>
                                      <th >Date Opened</th>
                                      <th >Due Date</th>
                                      <th >#Openings</th>
                                      <th >Opening Type</th>                                      
                                      <th >Status</th>   
                                      <th class="text-center">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                 @foreach ($openings as $opening)
								<tr>
									
								
									<td><a href="{{route('openings.show',$opening->id)}}" >{{ $opening->position_title }}</a></td>
									<td>{{ $opening->client->account_name }}</td>									
                  <td>{{ $opening->created_at }}</td>
                  <td>{{ $opening->due_date }}</td>
                  <td>{{ $opening->no_of_openings}}</td>
                  <td>{{ $opening->position_type}}</td>
                  <td>{{ Config::get('crm.opening_status')[$opening->status]}}</td>                  
                  
									
									<td class="text-center">
										<a href="{{ route('openings.edit', $opening->id) }}">Edit</a>
										&middot;
										@if(Auth::user()->getRole()->name == 'Administrator')
										@include('partials.modal', ['data' => $opening, 'name' => 'openings'])
										@endif
									</td>
								</tr>
		
			@endforeach
                                  
                                 
                                  </tbody>
                              </table>
                              <div class="text-center">
                                {{ pagination_links($openings) }}
                              </div>  
                              </section>
                          </div>
                      </section>
                  </div>
              </div>
	 
@endsection