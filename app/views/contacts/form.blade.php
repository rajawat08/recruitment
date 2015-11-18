@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['contacts.update', $model->id]]) }}
@else
{{ Form::open(['files' => true, 'route' => 'contacts.store']) }}
@endif
	<div class="form-group col-lg-2">
		{{ Form::label('gender', 'Gender:') }}
		{{ Form::select('gender', $gender,null, ['class' => 'form-control']) }}		
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
		{{ Form::label('fax', 'Fax:') }}
		{{ Form::text('fax', null, ['class' => 'form-control']) }}
		{{ $errors->first('fax', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('work_phone', 'Work Phone:') }}
		{{ Form::text('work_phone', null, ['class' => 'form-control']) }}
		{{ $errors->first('work_phone', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('clients', 'Clients:') }}
		{{ Form::select('client_id', $clients,null, ['class' => 'form-control']) }}
		{{ $errors->first('client_id', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-4">
		{{ Form::label('department', 'Department:') }}
		{{ Form::select('department', $departments,null, ['class' => 'form-control dpt_select']) }}
		{{ $errors->first('department', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-2 margintop3">
		
		@include('contacts.modal')
		
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control']) }}
		{{ $errors->first('title', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('reports_to', 'Reports To:') }}
		{{ Form::text('reports_to', null, ['class' => 'form-control']) }}
		{{ $errors->first('reports_to', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('lead_source', 'Lead Sources:') }}
		{{ Form::select('lead_source', $lead_sources, null, ['class' => 'form-control']) }}
		{{ $errors->first('lead_source', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('status', 'Status:') }}
		{{ Form::select('status', $status,null, ['class' => 'form-control']) }}
		{{ $errors->first('status', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('assistant_name', 'Assistant Name:') }}
		{{ Form::text('assistant_name', null, ['class' => 'form-control']) }}
		{{ $errors->first('assistant_name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('assistant_email', 'Assistant Email:') }}
		{{ Form::text('assistant_email', null, ['class' => 'form-control']) }}
		{{ $errors->first('assistant_email', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('assistant_contact', 'Assistant Contact:') }}
		{{ Form::text('assistant_contact', null, ['class' => 'form-control']) }}
		{{ $errors->first('assistant_contact', '<div class="text-danger">:message</div>') }}
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
		{{ Form::label('added_by', 'Added By:') }}
		{{ Form::select('added_by', $users, null, ['class' => 'form-control']) }}
		{{ $errors->first('added_by', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('managed_by', 'Managed By:') }}
		{{ Form::select('managed_by',$users, null, ['class' => 'form-control']) }}
		{{ $errors->first('managed_by', '<div class="text-danger">:message</div>') }}
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
		Email Opt Out : 
		{{ Form::checkbox('email_opt_out', 1, null) }}
		&nbsp;
		Do Not Call : 
		{{ Form::checkbox('do_not_call', 1, null) }}
		&nbsp;
		Reference : 
		{{ Form::checkbox('reference',1, null) }}
		&nbsp;
		Portal User: 
		{{ Form::checkbox('portal_user', 1,null) }}
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