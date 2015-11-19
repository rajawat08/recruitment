@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['leads.update', $model->id]]) }}
@else
{{ Form::open(['files' => true, 'route' => 'leads.store']) }}
@endif
	<div class="form-group col-lg-2">
		{{ Form::label('gender', 'Gender:') }}
		{{ Form::select('gender', $gender,isset($model) ? $model->gender : null, ['class' => 'form-control']) }}		
		{{ $errors->first('gender', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-5">
		{{ Form::label('firstname', 'First Name:') }}
		{{ Form::text('first_name', null, ['class' => 'form-control']) }}
		{{ $errors->first('first_name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-5">
		{{ Form::label('lastname', 'Last Name:') }}
		{{ Form::text('last_name', null, ['class' => 'form-control']) }}
		{{ $errors->first('last_name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('mobile_phone', 'Mobile Phone:') }}
		{{ Form::text('mobile_phone', null, ['class' => 'form-control']) }}
		{{ $errors->first('mobile_phone', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', null, ['class' => 'form-control']) }}
		{{ $errors->first('email', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('work_phone', 'Work Phone:') }}
		{{ Form::text('work_phone', null, ['class' => 'form-control']) }}
		{{ $errors->first('work_phone', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('fax', 'Fax:') }}
		{{ Form::text('fax', null, ['class' => 'form-control']) }}
		{{ $errors->first('fax', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('website', 'Website:') }}
		{{ Form::text('website', null, ['class' => 'form-control']) }}
		{{ $errors->first('website', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('client_account_name', 'Client:') }}
		{{ Form::text('client_account_name', null, ['class' => 'form-control']) }}
		{{ $errors->first('client_account_name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('sec_email', 'Secondary Email:') }}
		{{ Form::email('sec_email', null, ['class' => 'form-control']) }}
		{{ $errors->first('sec_email', '<div class="text-danger">:message</div>') }}
	</div>
	
	<div class="form-group col-lg-6">
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control']) }}
		{{ $errors->first('title', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('lead_source', 'Lead Sources:') }}
		{{ Form::select('lead_source', $lead_sources, isset($model) ? $model->lead_source : null, ['class' => 'form-control']) }}
		{{ $errors->first('lead_source', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('lead_source_name', 'Lead Source Name:') }}
		{{ Form::text('lead_source_name', null, ['class' => 'form-control']) }}
		{{ $errors->first('lead_source_name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('status', 'Lead Status:') }}
		{{ Form::select('status', $status,isset($model) ? $model->status : null, ['class' => 'form-control']) }}
		{{ $errors->first('status', '<div class="text-danger">:message</div>') }}
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
		{{ Form::select('country',$countries, isset($model) ? $model->country : null, ['class' => 'form-control']) }}
		{{ $errors->first('country', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('twitter', 'Twitter:') }}
		{{ Form::text('twitter', null, ['class' => 'form-control']) }}
		{{ $errors->first('twitter', '<div class="text-danger">:message</div>') }}
	</div>
	
	<div class="form-group col-lg-6">
		{{ Form::label('linkedin', 'Linkedin:') }}
		{{ Form::text('linkedin', null, ['class' => 'form-control']) }}
		{{ $errors->first('linkedin', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('doc_path', 'Document:') }}
		{{ Form::file('doc_path', ['class' => 'form-control']) }}
		{{ $errors->first('doc_path', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('added_by', 'Added By:') }}
		{{ Form::select('added_by', $users, isset($model) ? $model->added_by : null, ['class' => 'form-control']) }}
		{{ $errors->first('added_by', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('managed_by', 'Managed By:') }}
		{{ Form::select('managed_by',$users, isset($model) ? $model->managed_by : null, ['class' => 'form-control']) }}
		{{ $errors->first('managed_by', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('industry', 'Industry:') }}
		{{ Form::select('industry',$industry, isset($model) ? $model->industry : null, ['class' => 'form-control chosen-industry']) }}
		{{ $errors->first('industry', '<div class="text-danger">:message</div>') }}
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