@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['openings.update', $model->id]]) }}
@else
{{ Form::open(['files' => true, 'route' => 'openings.store']) }}
@endif
	
	<div class="form-group col-lg-6">
		{{ Form::label('position_title', 'Position Title:') }}
		{{ Form::text('position_title', null, ['class' => 'form-control']) }}
		{{ $errors->first('position_title', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('position_level', 'Position Level:') }}
		{{ Form::select('position_level', $position_level,isset($model) ? $model->position_level : null, ['class' => 'form-control']) }}
		{{ $errors->first('position_level', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('no_of_openings', 'No of openings:') }}
		{{ Form::text('no_of_openings', null, ['class' => 'form-control']) }}
		{{ $errors->first('no_of_openings', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('due_date', 'Due Date:') }}
		{{ Form::text('due_date', null, ['class' => 'form-control']) }}
		{{ $errors->first('due_date', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('position_type', 'Position Type:') }}
		{{ Form::select('position_type', $position_type,isset($model) ? $model->position_type : null, ['class' => 'form-control']) }}
		{{ $errors->first('position_type', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('client_id', 'Client:') }}
		{{ Form::select('client_id', $clients,isset($model) ? $model->client_id : null, ['class' => 'form-control choose-client']) }}
		{{ $errors->first('client_id', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('client_contact_id', 'Client Contact:') }}
		{{ Form::select('client_contact_id', [],isset($model) ? $model->client_contact_id : null, ['class' => 'form-control client-contacts']) }}
		{{ $errors->first('client_contact_id', '<div class="text-danger">:message</div>') }}
	</div>

	<div class="form-group col-lg-6">
		{{ Form::label('department', 'Department:') }}
		{{ Form::select('department', $department,isset($model) ? $model->department : null, ['class' => 'form-control']) }}
		{{ $errors->first('department', '<div class="text-danger">:message</div>') }}
	</div>
	
	<div class="form-group col-lg-6">
		{{ Form::label('status', 'Lead Status:') }}
		{{ Form::select('status', $status,isset($model) ? $model->status : null, ['class' => 'form-control']) }}
		{{ $errors->first('status', '<div class="text-danger">:message</div>') }}
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
		{{ Form::select('country',$countries, isset($model) ? $model->country : null, ['class' => 'form-control']) }}
		{{ $errors->first('country', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('job_skill_categories', 'Job Skills:') }}
		
		{{ Form::select('job_skill_categories',$job_skills, isset($model) ? $model->job_skill_categories : null, ['multiple' =>true,'class' => 'form-control chosen-industry']) }}
		{{ $errors->first('job_skill_categories', '<div class="text-danger">:message</div>') }}

	</div>
	
	<div class="form-group col-lg-6">
		{{ Form::label('keyword_for_fz_match', 'Keyword for FZ Match:') }}
		{{ Form::text('keyword_for_fz_match', null, ['class' => 'form-control']) }}
		{{ $errors->first('keyword_for_fz_match', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('salary_range', 'Salary Range:') }}
		{{ Form::select('salary_range', $salary_range, isset($model) ? $model->salary_range : null, ['class' => 'form-control']) }}
		{{ $errors->first('salary_range', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('priority', 'Priority:') }}
		{{ Form::text('priority', null, ['class' => 'form-control']) }}
		{{ $errors->first('priority', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('doc_path', 'Document:') }}
		{{ Form::file('doc_path', ['class' => 'form-control']) }}
		{{ $errors->first('doc_path', '<div class="text-danger">:message</div>') }}
	</div>
	
	
	<div class="form-group col-lg-12">
		{{ Form::label('job_description', 'Job Description:') }}
		{{ Form::textarea('job_description', null, ['class' => 'form-control ckeditor']) }}
		{{ $errors->first('job_description', '<div class="text-danger">:message</div>') }}
	</div>
	
	<div class="form-group col-lg-12">
		{{ Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) }}
	</div>
{{ Form::close() }}