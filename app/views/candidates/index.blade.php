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
     @include('candidates.modal', ['data' => $openings, 'name' => 'candidates'])
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <table id="candidates" class="table table-bordered table-striped table-condensed">
                                  <thead>
                                  <tr>
                                      <th></th>
                                      <th>Applicant Name</th>
                                      <th >Skills</th>
                                      <th >Phone</th>
                                      <th >Openings</th>
                                      <th >Email</th>
                                      <th >Country</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                 @foreach ($candidates as $candidate)
								<tr>
									<td><input type="checkbox" value='{{$candidate->id}}'  /></td>
									<td><a href="{{route('candidates.show',$candidate->id)}}" >{{ $candidate->name }}</a></td>
									<td>
                    @if(count($candidate->candidates))
                     <?php $skills = json_decode($candidate->candidates[0]->skills); ?>
                        @if(count($skills))
                        @foreach ($skills as $skill)
                        <span class="label label-info">{{$skill}}</span>
                        @endforeach
                        @else
                        N/A
                        @endif
                    @else
                      "N/A";
                    @endif
                    


                  </td>
									<td>{{ count($candidate->candidates) ? $candidate->candidates[0]->mobile_phone : "N/A" }}</td>
                  <td>{{count($candidate->candidates[0]->openings)}}</td>
									<td>{{ $candidate->email }}</td>
                  <td>{{ count($candidate->candidates) ? $countries[$candidate->candidates[0]->country] : "N/A" }}</td>
		
									<td class="text-center">

										<a href="{{ route('candidates.edit', $candidate->id) }}">Edit</a>
										&middot;
										@if($candidate->getRole()->name != 'Administrator')
										@include('partials.modal', ['data' => $candidate, 'name' => 'candidates'])
										@endif

                     @if(count($candidate->candidates[0]->openings))
                      &middot;
                    <a href="{{ url('emails/to-client/'.$candidate->candidates[0]->id) }}">Send Client</a>
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