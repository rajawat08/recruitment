@extends('layouts.master')

@section('title')
All Contacts
@stop

@section('content')
	
	<div class="row">
				
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Contacts ({{ $contacts->getTotal() }})
		&middot;
		<small>{{ link_to_route('contacts.create', 'Add New',null,['class' => 'btn btn-info btn-xs']) }}</small>
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                  <thead>
                                  <tr>                                     
                                      <th>Contact Name</th>
                                      <th >Client</th>
                                      <th >Contact Number</th>
                                      <th >Email</th>
                                      <th >Location</th>
                                      <th >Status</th>
                                      <th >Account Type</th>
                                      <th >Managed By</th>                                      
                                      <th class="text-center">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                 @foreach ($contacts as $contact)
								<tr>
									
									<td><a href="{{route('contacts.show',$contact->id)}}" >{{ $contact->first_name }}</a></td>
									<td>{{ $contact->client->account_name }}</td>
									<td>{{ $contact->mobile_phone }}</td>									
                  <td>{{ $contact->email }}</td>
                  <td>{{ $contact->address }}</td>
                  <td>{{ ucfirst($contact->status) }}</td>                  
                  <td>{{ $contact->client->account_type }}</td>
									<td>{{ $contact->manageBy->name}}</td>
									<td class="text-center">
										<a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
										&middot;
										@if(Auth::user()->getRole()->name == 'Administrator')
										@include('partials.modal', ['data' => $contact, 'name' => 'contacts'])
										@endif
									</td>
								</tr>
		
			@endforeach
                                  
                                 
                                  </tbody>
                              </table>
                              </section>
                          </div>
                      </section>
                  </div>
              </div>
	<div class="text-center">
		{{ pagination_links($contacts) }}
	</div>   
@endsection