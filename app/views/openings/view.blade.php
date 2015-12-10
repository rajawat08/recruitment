@extends('layouts.master')

@section('title')
  Opening | {{$opening->position_title}}
@stop

@section('content')

   <div class="row">
		<aside class="profile-nav alt green-border col-lg-3">
                      <section class="panel">
                          <div class="user-heading client-heading alt green-bg">                              
                              <h1>{{$opening->position_title}}</h1>
                              <p>{{$opening->position_level}}</p>
                              
                              <p> <span class="label label-primary">{{$status[$opening->status]}}
                              
                             
                              </span>
                              </p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="javascript:;"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
                             <!--  <li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li> -->
                              <li><a href="{{route('openings.edit', $opening->id)}}"> <i class="fa fa-edit"></i> Edit Opening</a></li>
                              <li><a href="javascript:;"  onclick="javascript:alert('In progress')" > <i class="fa fa-file"></i> Documents</a></li>
                              <li><a href="{{route('openings.index')}}"> <i class="fa fa-arrow-left"></i> Back</a></li>

                          </ul>

                      </section>
                  </aside>

                  <aside class="profile-info col-lg-9">
                  	<section class="panel">
						
						<div class="panel-body">
							<div class="state-overview col-lg-6">
                  <section class="panel">
                      <div class="symbol client-symbols blue" title="No Of Openings">
                          <i class="fa fa-tags"></i>
                      </div>
                      <div class="value">
                       
                          <h4>{{$opening->no_of_openings}} openings</h4>
                        

                          
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
                                      <p><span>Position Title</span>: &nbsp;{{$opening->position_title." ".$opening->last_name}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Openings</span>: &nbsp;{{$opening->no_of_openings ? $opening->no_of_openings : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Position Level</span>: &nbsp;{{$opening->position_level ? $opening->position_level : "N/A"}}</p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Due Date</span>: &nbsp;{{$opening->due_date}}</p>
                                  </div>                                  
                                  <div class="bio-row">
                                      <p><span>Position Type </span>: &nbsp;{{$opening->postion_type ? $opening->postion_type : "N/A" }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>department</span>: &nbsp; {{$opening->lead_source_name ? $opening->lead_source_name : "N/A"}} </p>
                                  </div>                                
                                 <div class="bio-row">
                                      <p><span>priority</span>: &nbsp; {{$opening->priority ? $opening->priority : "N/A"}} </p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Salary Range</span>: &nbsp; {{$opening->salary_range ? $salary_range[$opening->salary_range]: "N/A"}} </p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>status</span>: &nbsp; {{$opening->status ? $status[$opening->status] : "N/A"}} </p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Client</span>: &nbsp; {{$opening->client->account_name ? link_to_route('clients.show',$opening->client->account_name,$opening->client_id) : "N/A"}} </p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Skills </span>: 
                                        @for($i=0;$i<count($opening->job_skill_categories); $i++)

                                         <span class="label label-primary" style="width:auto !important;">{{$opening->job_skill_categories[$i] }}</span>
                                        @endfor
                                        </p>
                                  </div>
                              </div>
                          </div>
                      </section>

                      <section class="panel">
						<header class="panel-heading">
						Contact Details						
						</header>
						<div class="panel-body bio-graph-info">
							<div class="row">
                                 
                                  <div class="bio-row">
                                      <p><span>City</span>: &nbsp;{{$opening->city ? $opening->city : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>State </span>: &nbsp;{{$opening->state ? $opening->state : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Country </span>: &nbsp;{{$countries[$opening->country]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Contact Person</span>: &nbsp;
                                        {{count($contact) ? link_to_route('contacts.show',$contact[0]->first_name,$contact[0]->id) : 'N/A'}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Posted At</span>: &nbsp;{{$opening->created_at ? $opening->created_at : 'N/A'}}</p>
                                  </div>
                                                       
                                  
                                   
                              </div>

						</div>
					</section> 

          <section class="panel">
            <header class="panel-heading">
                  Assigned Users
             </header>
              <div class="panel-body">
                  <table id="leads" class="table table-bordered table-striped table-condensed">
                      <tbody>
                        @foreach ($users as $user)
                      <tr>
                          <td> 
                            @if($user->user->getRole()  && $user->user->getRole()->name =='Candidate')
                            <a href="{{route('candidates.show',$user->user->id)}}" target="_blank" >{{$user->user->name}}</a>
                            @else
                            {{$user->user->name}}
                            @endif
                            </td>
                          <td>{{ $user->user->getRole() ? $user->user->getRole()->name : 'Unknow' }}</td>
                          
                           <td>
                            <a href="javascript:;" target="_blank" onclick="removeOpening({{$user->id}})" >Remove</a>
                          </td>

                      </tr>
                      @endforeach
                      @if(!count($users))
                      <tr><td colspan="3"> No More Assigned Users...</td></tr>
                      @endif
                    </tbody>
                  </table>
              </div>
            </section>
					
            <section class="panel">
            <header class="panel-heading">
                          Job Description
                         </header>
                          <div class="panel-body">
                                     {{$opening->job_description}}
                                  </div>
                      </section>
                  </aside>
	</div>
	
@endsection