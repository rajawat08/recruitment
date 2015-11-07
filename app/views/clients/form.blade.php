@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['clients.update', $model->id]]) }}
@else
{{ Form::open(['files' => true, 'route' => 'clients.store']) }}
@endif
	<div class="form-group col-lg-6">
		{{ Form::label('account_name', 'Account Name:') }}
		{{ Form::text('account_name', null, ['class' => 'form-control']) }}
		{{ $errors->first('account_name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('website', 'Website:') }}
		{{ Form::text('website', null, ['class' => 'form-control']) }}
		{{ $errors->first('website', '<div class="text-danger">:message</div>') }}
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
		{{ Form::label('fax', 'Fax:') }}
		{{ Form::text('fax', null, ['class' => 'form-control']) }}
		{{ $errors->first('fax', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('secondary_phone', 'Other Phone:') }}
		{{ Form::text('secondary_phone', null, ['class' => 'form-control']) }}
		{{ $errors->first('secondary_phone', '<div class="text-danger">:message</div>') }}
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
		{{ Form::label('account_type', 'Account Type:') }}
		{{ Form::select('account_type', $account_type,null, ['class' => 'form-control']) }}
		{{ $errors->first('account_type', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('status', 'Status:') }}
		{{ Form::select('status', $status,null, ['class' => 'form-control']) }}
		{{ $errors->first('status', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('revenue_type', 'Revenue Type:') }}
		{{ Form::select('revenue_type', $revenue, null, ['class' => 'form-control']) }}
		{{ $errors->first('revenue_type', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('industry', 'Industry:') }}
		{{ Form::select('industry',$industry, null, ['class' => 'form-control']) }}
		{{ $errors->first('industry', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('billing_rate', 'Billing Rate:') }}
		{{ Form::text('billing_rate', null, ['class' => 'form-control']) }}
		{{ $errors->first('billing_rate', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('contract_start', 'Contract Start:') }}
		{{ Form::text('contract_start', null, ['class' => 'form-control']) }}
		{{ $errors->first('contract_start', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('contract_end', 'Contract End:') }}
		{{ Form::text('contract_end', null, ['class' => 'form-control']) }}
		{{ $errors->first('contract_end', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('contract', 'Contract:') }}
		{{ Form::file('contract', ['class' => 'form-control']) }}
		{{ $errors->first('contract', '<div class="text-danger">:message</div>') }}
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
	<div class="form-group col-lg-12">
		{{ Form::label('notes', 'Notes:') }}
		{{ Form::textarea('notes', null, ['class' => 'form-control ckeditor']) }}
		{{ $errors->first('notes', '<div class="text-danger">:message</div>') }}
	</div>
	
	<div class="form-group col-lg-12">
		{{ Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) }}
	</div>
{{ Form::close() }}