@extends('layouts.master')

@section('title')
  Contact | Profile | {{$contact->first_name." ".$contact->last_name}}
@stop

@section('content')

   <div class="row">
		<aside class="profile-nav alt green-border col-lg-3">
                      <section class="panel">
                          <div class="user-heading client-heading alt green-bg">                              
                              <h1>{{$contact->first_name." ".$contact->last_name}}</h1>
                              <p>{{$contact->city.", ".$countries[$contact->country]}}</p>
                              @if($contact->status == 'active')
                              <p> <span class="label label-primary">{{$status[$contact->status]}}
                              @elseif($contact->status == 'inactive')
                              <p> <span class="label label-warning">{{$status[$contact->status]}}
                              @else
                              <p> <span class="label label-default">{{$status[$contact->status]}}
                              @endif
                              
                              ({{isset($lead_sources[$contact->lead_source]) ? $lead_sources[$contact->lead_source] : $contact->lead_source }})
                              </span>
                              </p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="javascript:;"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
                             <!--  <li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li> -->
                              <li><a href="{{route('contacts.edit', $contact->id)}}"> <i class="fa fa-edit"></i> Edit Contact</a></li>
                             <!--  <li><a href="javascript:;"  onclick="javascript:alert('In progress')" > <i class="fa fa-file"></i> Documents</a></li> -->
                              <li><a href="{{route('contacts.index')}}"> <i class="fa fa-arrow-left"></i> Back</a></li>

                          </ul>

                      </section>
                  </aside>

                  <aside class="profile-info col-lg-9">
                  	<section class="panel">
						
						<div class="panel-body">
							<div class="state-overview col-lg-6">
                  <section class="panel">
                      <div class="symbol client-symbols blue" title="Contact Email">
                          <i class="fa fa-envelope"></i>
                      </div>
                      <div class="value">
                          <h4><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></h4>
                          
                      </div>
                  </section>
              </div>
              <div class="state-overview col-lg-3">
                  <section class="panel">
                      <div class="symbol client-symbols blue" title="Contact Mobile">
                          <i class="fa fa-mobile"></i>
                      </div>
                      <div class="value">
                          <h4>{{$contact->mobile_phone}}</h4>
                          
                      </div>
                  </section>
              </div>

              <div class="state-overview col-lg-3">
                    <section class="panel">
                        <div class="symbol client-symbols blue" title="Contact Phone">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="value">
                            <h4>{{$contact->work_phone}}</h4>
                            
                        </div>
                    </section>
                </div>

						</div>
					</section> 
                  	<section class="panel">
                          
                          <div class="panel-body bio-graph-info">
                              <h1>Basic Details</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>Client</span>: &nbsp;<a href="{{route('clients.show',$contact->client_id)}}" >{{$contact->client->account_name}}</a></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Title</span>: &nbsp;{{$contact->title ? $contact->title : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Reports To</span>: &nbsp;{{$contact->reports_to ? $contact->reports_to : "N/A" }} </p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Status </span>: {{$status[$contact->status]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Lead Source</span>: &nbsp;{{isset($lead_sources[$contact->lead_source]) ? $lead_sources[$contact->lead_source] : $contact->lead_source }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Assistant</span>: &nbsp; {{$contact->assistant_name ? $contact->assistant_name : "N/A"}} </p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Assistant Contact </span>: {{$contact->assistant_contact ? $contact->assistant_contact : "N/A"}}</p>
                                  </div>
                                 <div class="bio-row">
                                      <p><span>Assistant Email </span>: {{$contact->assistant_email ? $contact->assistant_email : "N/A"}}</p>
                                  </div>
                              </div>
                          </div>
                      </section>

                      <section class="panel">
						<header class="panel-heading">
						Other Details						
						</header>
						<div class="panel-body bio-graph-info">
							<div class="row">
                                  <div class="bio-row">
                                      <p><span>Address</span>: &nbsp;{{$contact->address ? $contact->address : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>City</span>: &nbsp;{{$contact->city ? $contact->city : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>State </span>: &nbsp;{{$contact->state ? $contact->state : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Country </span>: &nbsp;{{$countries[$contact->country]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Twitter</span>: &nbsp;{{$contact->twitter ? $contact->twitter : 'N/A'}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>LinkedIn</span>: &nbsp;{{$contact->linkedin ? $contact->linkedin : 'N/A'}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Fax</span>: &nbsp;{{$contact->fax ? $contact->fax : 'N/A'}}</p>
                                  </div>                                 
                                  <div class="bio-row">
                                      <p><span>Added By</span>: &nbsp;{{ $contact->user ? $contact->user->name : 'N/A'}}</p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Managed By</span>: &nbsp;{{$contact->manageBy ? $contact->manageBy->name : 'N/A'}}</p>
                                  </div>
                              </div>

						</div>
					</section> 

					<section class="panel">
						<header class="panel-heading">
                          Preferences
                         </header>
                          <div class="panel-body">
                                      <ul class="summary-list">
                                          <li> <p ><b>Email Opt Out</b></p>
                                                  <p>{{$contact->email_opt_out ? 'Yes' : 'No'}}</p>
                                              
                                          </li>
                                          <li>
                                              <p ><b>Do Not Call</b></p>
                                                  <p>{{$contact->do_not_call ?'Yes' : 'No'}}</p>
                                          </li>
                                          <li>
                                              <p ><b>References</b></p>
                                                  <p>{{$contact->reference ? 'Yes' : 'No'}}</p>
                                          </li>
                                          <li>
                                              <p ><b>Portal User</b></p>
                                                  <p>{{$contact->portal_user ? 'Yes' : 'No'}}</p>
                                          </li>
                                         
                                      </ul>
                                  </div>
                      </section>
            <section class="panel">
            <header class="panel-heading">
                          Notes
                         </header>
                          <div class="panel-body">
                                     {{$contact->notes}}
                                  </div>
                      </section>
                  </aside>
	</div>
	
@endsection