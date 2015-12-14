@extends('layouts.master')

@section('title') 
	Send Email
@stop

@section('content')
    <div class="row">
		

		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
				Send Email 
				&middot; <small>{{ link_to_route('candidates.index', 'Back') }}</small>

				</header>
				<div class="panel-body">
					
						{{ Form::open(['files' => true,'class' => "form-horizontal", 'url' => 'emails/to-client/','method' =>'post']) }}

					<input type="hidden" name="candidate_id" value="{{$id}}" /> 
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">To</label>
                                                  <div class="col-lg-8">
                                                     {{ Form::select('to[]',$to,  null, ['multiple' =>true,'class' => 'form-control chosen-industry']) }}
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Cc</label>
                                                  <div class="col-lg-8">
                                                  	{{ Form::select('cc[]',$cc,  null, ['placeholder'=> 'choose email address' ,'multiple' =>true,'class' => 'form-control chosen-industry']) }}
                                                      
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Subject</label>
                                                  <div class="col-lg-8">
                                                      <input type="text" name="subject" class="form-control" id="inputPassword1" placeholder="">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Message</label>
                                                  <div class="col-lg-8">
                                                      <textarea  id="" name="message" class="form-control" cols="30" rows="10"></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Attachments</label>
                                                  <div class="col-lg-8">
                                                    {{ Form::file('attachments') }}
                                                     
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                      
                                                      <button type="submit" class="btn btn-send">Send</button>
                                                  </div>
                                              </div>
                                        {{Form::close()}}

				</div>
			</section> 
		</div>
	</div>
	
	</section>
	</section>
@endsection