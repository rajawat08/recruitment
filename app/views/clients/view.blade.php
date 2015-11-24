@extends('layouts.master')

@section('title')
  Client | Profile | {{$client->account_name}}
@stop

@section('content')

   <div class="row">
		<aside class="profile-nav alt green-border col-lg-3">
                      <section class="panel">
                          <div class="user-heading client-heading alt green-bg">                              
                              <h1>{{$client->account_name}}</h1>
                              <p>{{$client->email}}</p>
                              @if($client->status == 'active')
                              <p> <span class="label label-primary">{{$status[$client->status]}}</span></p>
                              @elseif($client->status == 'inactive')
                              <p> <span class="label label-warning">{{$status[$client->status]}}</span></p>
                              @else
                              <p> <span class="label label-default">{{$status[$client->status]}}</span></p>
                              @endif
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="javascript:;"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
                             <!--  <li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li> -->
                              <li><a href="{{route('clients.edit', $client->id)}}"> <i class="fa fa-edit"></i> Edit Account</a></li>
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
                                          <h4><a href="mailto:{{$client->email}}">{{$client->email}}</a></h4>
                                          
                                      </div>
                                  </section>
                              </div>
                              <div class="state-overview col-lg-6">
                                  <section class="panel">
                                      <div class="symbol client-symbols blue" title="Contact Phone">
                                          <i class="fa fa-phone"></i>
                                      </div>
                                      <div class="value">
                                          <h4>{{$client->phone}}</h4>
                                          
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
                                      <p><span>Website</span>: <a href="http://{{$client->website}}" target="_blank">{{$client->website}} </a></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Industry</span>: &nbsp;{{isset($industry[$client->industry]) ? $industry[$client->industry]  : $client->industry}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Account Type </span>: {{$account_type[$client->account_type]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Status </span>: {{$status[$client->status]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Email Opt Out</span>: &nbsp;{{$client->email_opt_out ? 'Yes' : 'No'}}</p>
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
                                      <p><span>Address</span>: &nbsp;{{$client->address ? $client->address : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>City</span>: &nbsp;{{$client->city ? $client->city : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>State </span>: &nbsp;{{$client->state ? $client->state : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Country </span>: &nbsp;{{$countries[$client->country]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Twitter</span>: &nbsp;{{$client->twitter ? $client->twitter : 'N/A'}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>LinkedIn</span>: &nbsp;{{$client->linkedin ? $client->linkedin : 'N/A'}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Fax</span>: &nbsp;{{$client->fax ? $client->fax : 'N/A'}}</p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Other Phone</span>: &nbsp;{{$client->secondary_phone ? $client->secondary_phone : 'N/A'}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Added By</span>: &nbsp;{{ $client->user ? $client->user->name : 'N/A'}}</p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Managed By</span>: &nbsp;{{$client->manageBy ? $client->manageBy->name : 'N/A'}}</p>
                                  </div>
                              </div>

						</div>
					</section> 

					<section class="panel">
						<header class="panel-heading">
                          Contract Details
                         </header>
                          <div class="panel-body">
                                      <ul class="summary-list">
                                          <li> <p ><b>Revenue Type</b></p>
                                                  <p>{{$client->revenue_type ? $client->revenue_type : 'N/A'}}</p>
                                              
                                          </li>
                                          <li>
                                              <p ><b>Billing Rate</b></p>
                                                  <p>{{$client->billing_rate ? $client->billing_rate : 'N/A'}}</p>
                                          </li>
                                          <li>
                                              <p ><b>Contract Start</b></p>
                                                  <p>{{$client->contract_start ? $client->contract_start : 'N/A'}}</p>
                                          </li>
                                          <li>
                                              <p ><b>Contract End</b></p>
                                                  <p>{{$client->contract_end ? $client->contract_end : 'N/A'}}</p>
                                          </li>
                                         
                                      </ul>
                                  </div>
                      </section>

                  </aside>
	</div>
	
@endsection