@extends('layouts.master')

@section('title')
  All Leads 
@stop

@section('content')
	
	<div class="row">
				
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Leads ({{ $leads->getTotal() }})
		&middot;
		{{ link_to_route('leads.create', 'Add New',null, ['class' => 'btn btn-info btn-xs']) }}
    <a href="javascript:;" class="btn btn-info btn-xs" onclick="convertToClient()" > Convert To Client </a>    
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <table id="leads" class="table table-bordered table-striped table-condensed">
                                  <thead>
                                  <tr>
                                      <th></th>                                   
                                      <th>Lead Name</th>
                                      <th >Client</th>
                                      <th >Contact Number</th>
                                      <th >Document</th>
                                      <th >Email</th>
                                      <th >Website</th>                                      
                                      <th >Status</th>                                      
                                      <th >Managed By</th>                                      
                                      <th class="text-center">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                 @foreach ($leads as $lead)
								<tr>
									<td><input type="checkbox" value='{{$lead->id}}'  /></td>
									<td><a href="{{route('leads.show',$lead->id)}}" >{{ $lead->name }}</a></td>
									<td>{{ $lead->client_account_name }}</td>
									<td>{{ $lead->mobile_phone }}</td>
									<td>{{ $lead->doc_path != "" ? HTML::link($fullPath."/".$lead->doc_path,'Docs',['target' => '_blank']) :'N/A' }}</td>
                  <td>{{ $lead->email }}</td>
                  <td>{{ $lead->website }}</td>
                  <td>{{ Config::get('crm.lead_status')[$lead->status]}}</td>                  
                  <td>{{ $lead->user->name }}</td>
									
									<td class="text-center">
										<a href="{{ route('leads.edit', $lead->id) }}">Edit</a>
										&middot;
										@if(Auth::user()->getRole()->name == 'Administrator')
										@include('partials.modal', ['data' => $lead, 'name' => 'leads'])
										@endif
									</td>
								</tr>
		
			@endforeach
                                  
                                 
                                  </tbody>
                              </table>
                              <div class="text-center">
                                {{ pagination_links($leads) }}
                              </div>  
                              </section>
                          </div>
                      </section>
                  </div>
              </div>
	 
@endsection