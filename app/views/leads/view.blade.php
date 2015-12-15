@extends('layouts.master')

@section('title')
  Lead | Profile | {{$lead->first_name." ".$lead->last_name}}
@stop

@section('content')

   <div class="row">
		<aside class="profile-nav alt green-border col-lg-3">
                      <section class="panel">
                          <div class="user-heading client-heading alt green-bg">                              
                              <h1>{{$lead->first_name." ".$lead->last_name}}</h1>
                              <p>{{$lead->city.", ".$countries[$lead->country]}}</p>
                              
                              <p> <span class="label label-primary">{{$status[$lead->status]}}
                              
                              
                              ({{isset($lead_sources[$lead->lead_source]) ? $lead_sources[$lead->lead_source] : $lead->lead_source }})
                              </span>
                              </p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="javascript:;"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
                             <!--  <li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li> -->
                              <li><a href="{{route('leads.edit', $lead->id)}}"> <i class="fa fa-edit"></i> Edit Lead</a></li>
                             <!--  <li><a href="javascript:;"  onclick="javascript:alert('In progress')" > <i class="fa fa-file"></i> Documents</a></li> -->
                              <li><a href="{{route('leads.index')}}"> <i class="fa fa-arrow-left"></i> Back</a></li>

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
                        @if($lead->email)
                          <h4><a href="mailto:{{$lead->email}}">{{$lead->email}}</a></h4>
                        @else
                         "N/A"
                        @endif

                          
                      </div>
                  </section>
              </div>
              <div class="state-overview col-lg-3">
                  <section class="panel">
                      <div class="symbol client-symbols blue" title="Contact Mobile">
                          <i class="fa fa-mobile"></i>
                      </div>
                      <div class="value">
                        @if($lead->mobile_phone)
                          <h4>{{$lead->mobile_phone}}</h4>
                        @else
                          "N/A" 
                        @endif
                          
                      </div>
                  </section>
              </div>

              <div class="state-overview col-lg-3">
                    <section class="panel">
                        <div class="symbol client-symbols blue" title="Contact Phone">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="value">
                          @if($lead->work_phone)
                            <h4>{{$lead->work_phone}}</h4>
                          @else
                           "N/A"
                          @endif
                            
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
                                      <p><span>Client</span>: &nbsp;{{$lead->first_name." ".$lead->last_name}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Title</span>: &nbsp;{{$lead->title ? $lead->title : "N/A"}}</p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Industry</span>: &nbsp;{{isset($industry[$lead->industry]) ? $industry[$lead->industry]  : $lead->industry}}</p>
                                  </div>                                  
                                  <div class="bio-row">
                                      <p><span>Lead Source</span>: &nbsp;{{isset($lead_sources[$lead->lead_source]) ? $lead_sources[$lead->lead_source] : $lead->lead_source }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Source Name</span>: &nbsp; {{$lead->lead_source_name ? $lead->lead_source_name : "N/A"}} </p>
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
                                      <p><span>Address</span>: &nbsp;{{$lead->address ? $lead->address : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>City</span>: &nbsp;{{$lead->city ? $lead->city : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>State </span>: &nbsp;{{$lead->state ? $lead->state : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Country </span>: &nbsp;{{$countries[$lead->country]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Twitter</span>: &nbsp;{{$lead->twitter ? $lead->twitter : 'N/A'}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>LinkedIn</span>: &nbsp;{{$lead->linkedin ? $lead->linkedin : 'N/A'}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Fax</span>: &nbsp;{{$lead->fax ? $lead->fax : 'N/A'}}</p>
                                  </div> 
                                   <div class="bio-row">
                                      <p><span>Secondary Email</span>: &nbsp;{{$lead->sec_email ? $lead->sec_email : 'N/A'}}</p>
                                  </div>                                
                                  <div class="bio-row">
                                      <p><span>Added By</span>: &nbsp;{{ $lead->user ? $lead->user->name : 'N/A'}}</p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Managed By</span>: &nbsp;{{$lead->manageBy ? $lead->manageBy->name : 'N/A'}}</p>
                                  </div>
                              </div>

						</div>
					</section> 

					
            <section class="panel">
            <header class="panel-heading">
                          Notes
                         </header>
                          <div class="panel-body">
                                     {{$lead->notes}}
                                  </div>
                      </section>
                  </aside>
	</div>
	
@endsection