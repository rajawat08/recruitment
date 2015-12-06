@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['candidates.update', $model->user->id]]) }}
{{ Form::hidden('candidate_id', $model->id, ['class' => 'form-control']) }}
@else
{{ Form::open(['files' => true, 'route' => 'candidates.store']) }}
@endif
	<div class="form-group col-lg-2">
		{{ Form::label('gender', 'Gender:') }}
		{{ Form::select('gender', $gender,null, ['class' => 'form-control']) }}		
		{{ $errors->first('gender', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-5">
		{{ Form::label('first_name', 'First Name:') }}
		{{ Form::text('first_name', null, ['class' => 'form-control']) }}
		{{ $errors->first('first_name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-5">
		{{ Form::label('last_name', 'Last Name:') }}
		{{ Form::text('last_name', null, ['class' => 'form-control']) }}
		{{ $errors->first('last_name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('mobile_phone', 'Mobile:') }}
		{{ Form::text('mobile_phone', null, ['class' => 'form-control']) }}
		{{ $errors->first('mobile_phone', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('phone', 'Phone:') }}
		{{ Form::text('phone', null, ['class' => 'form-control']) }}
		{{ $errors->first('phone', '<div class="text-danger">:message</div>') }}
	</div>	
	<div class="form-group col-lg-6">
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', null, ['class' => 'form-control']) }}
		{{ $errors->first('email', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password', ['class' => 'form-control']) }}
		{{ $errors->first('password', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('merital_status', 'Marital Status:') }}
		{{ Form::select('merital_status', $marital_status,null, ['class' => 'form-control']) }}
		{{ $errors->first('merital_status', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('date_of_birth', 'Date Of Birth:') }}
		{{ Form::text('date_of_birth', null, ['class' => 'form-control default-date-picker' , 'autocomplete' =>'off' , 'placeholder' => 'click here to choose date' , 'readonly' => true]) }}
		{{ $errors->first('date_of_birth', '<div class="text-danger">:message</div>') }}
	</div>
	
	<div class="form-group col-lg-6">
		{{ Form::label('address', 'Address:') }}
		{{ Form::text('address', null, ['class' => 'form-control']) }}
		{{ $errors->first('address', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('city', 'City:') }}
		{{ Form::text('city', null, ['class' => 'form-control']) }}
		{{ $errors->first('city', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('state', 'State:') }}
		{{ Form::text('state', null, ['class' => 'form-control']) }}
		{{ $errors->first('state', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('country', 'Country:') }}
		{{ Form::select('country',$countries, null, ['class' => 'form-control']) }}
		{{ $errors->first('country', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('current_salary', 'Current Salary:') }}
		{{ Form::text('current_salary', null, ['class' => 'form-control']) }} Lakhs/Anum
		
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('expt_salary', 'Expected Salary:') }}
		{{ Form::text('expt_salary', null, ['class' => 'form-control']) }} Lakhs/Anum
		
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('notice_period', 'Notice Period:') }}
		{{ Form::text('notice_period', null, ['class' => 'form-control']) }} days
		
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('status', 'Status:') }}
		{{ Form::select('status', $status,isset($model) ? $model->status : null, ['class' => 'form-control']) }}
		{{ $errors->first('status', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('skills', 'Job Skills:') }}		
		{{ Form::select('skills[]',$job_skills, isset($model) ? $model->skills : null, ['multiple' =>true,'class' => 'form-control chosen-industry']) }}
		{{ $errors->first('skills', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('doc_path', 'Document:') }}
		{{ Form::file('doc_path', ['class' => 'form-control']) }}
		{{ $errors->first('doc_path', '<div class="text-danger">:message</div>') }}
	</div>
	
	<div class="form-group col-lg-12">
		{{ Form::label('notes', 'Notes:') }}
		{{ Form::textarea('notes', null, ['class' => 'form-control ckeditor']) }}
		{{ $errors->first('notes', '<div class="text-danger">:message</div>') }}
	</div>

	
	<div class="form-group col-lg-12">
		{{ Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) }}
	</div>
{{ Form::close() }}