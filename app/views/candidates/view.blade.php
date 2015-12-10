@extends('layouts.master')

@section('title')
  Candidate | {{$candidate->first_name." ".$candidate->last_name}}
@stop

@section('content')

   <div class="row">
		<aside class="profile-nav alt green-border col-lg-3">
                      <section class="panel">
                          <div class="user-heading client-heading alt green-bg">                              
                              <h1>{{$candidate->first_name." ".$candidate->last_name}}</h1>
                              <p>{{$candidate->city}}</p>
                              
                              <p> <span class="label label-primary">{{$status[$candidate->status]}}
                              
                             
                              </span>
                              </p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="javascript:;"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
                             <!--  <li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li> -->
                              <li><a href="{{route('candidates.edit', $candidate->user_id)}}"> <i class="fa fa-edit"></i> Edit Canidate Info</a></li>
                              <li><a href="javascript:;"  onclick="javascript:alert('In progress')" > <i class="fa fa-file"></i> Documents</a></li>
                              <li><a href="{{route('candidates.index')}}"> <i class="fa fa-arrow-left"></i> Back</a></li>

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
                          <h4><a href="mailto:{{$candidate->email}}">{{$candidate->email}}</a></h4>
                          
                      </div>
                  </section>
              </div>
              <div class="state-overview col-lg-3">
                  <section class="panel">
                      <div class="symbol client-symbols blue" title="Contact Mobile">
                          <i class="fa fa-mobile"></i>
                      </div>
                      <div class="value">
                          <h4>{{$candidate->mobile_phone}}</h4>
                          
                      </div>
                  </section>
              </div>

              <div class="state-overview col-lg-3">
                    <section class="panel">
                        <div class="symbol client-symbols blue" title="Contact Phone">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="value">
                            <h4>{{$candidate->phone}}</h4>
                            
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
                                      <p><span>Gender</span>: &nbsp;{{$gender[$candidate->gender]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Date Of Birth</span>: &nbsp;{{$candidate->date_of_birth ? $candidate->date_of_birth : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Skills</span>: &nbsp;  @if(count($candidate->skills))
                    
                    
                        @foreach ($candidate->skills as $skill)
                        <span class="label label-info" style="width:auto !important;">{{$skill}}</span>
                        @endforeach
                       
                    @else
                      N/A
                    @endif</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Status </span>: {{$status[$candidate->status]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Merital Status</span>: &nbsp;{{ $marital_status[$candidate->merital_status]}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Current Salary</span>: &nbsp; {{$candidate->current_salary ? $candidate->current_salary." Lakhs/Anum" : "N/A"}} </p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Expected Salary</span>: {{$candidate->expt_salary ? $candidate->expt_salary." Lakhs/Anum" : "N/A"}}</p>
                                  </div>
                                 <div class="bio-row">
                                      <p><span>Notice Peroid </span>: {{$candidate->notice_period ? $candidate->notice_period." days" : "N/A"}}</p>
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
                                      <p><span>City</span>: &nbsp;{{$candidate->city ? $candidate->city : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>State </span>: &nbsp;{{$candidate->state ? $candidate->state : "N/A"}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Country </span>: &nbsp;{{$countries[$candidate->country]}}</p>
                                  </div>
                                 
                                                       
                                  
                                   
                              </div>

            </div>
          </section> 

					
            <section class="panel">
            <header class="panel-heading">
                  Openings
             </header>
              <div class="panel-body">
                  <table id="leads" class="table table-bordered table-striped table-condensed">
                      <tbody>
                        @foreach ($openings as $opening)
                      <tr>
                          <td>{{$opening->opening->position_title}}, posted at {{$opening->opening->created_at}}</td>
                          <td>
                            <a href="{{route('openings.show',$opening->opening->id)}}" target="_blank" >Preview</a>
                          </td>
                           <td>
                            <a href="javascript:;" target="_blank" onclick="removeOpening({{$opening->id}})" >Remove</a>
                          </td>

                      </tr>
                      @endforeach
                      @if(!count($openings))
                      <tr><td colspan="3"> No More Openings...</td></tr>
                      @endif
                    </tbody>
                  </table>
              </div>
            </section>

             <section class="panel">
            <header class="panel-heading">
                  Notes
             </header>
              <div class="panel-body">
                 {{$candidate->notes}}
              </div>
            </section>
  </aside>
	</div>
	
@endsection