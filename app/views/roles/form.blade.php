@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['roles.update', $model->id]]) }}
@else
{{ Form::open(['files' => true, 'route' => 'roles.store']) }}
@endif
	<div class="form-group col-lg-6">
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		{{ $errors->first('name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('slug', 'Alias:') }}
		{{ Form::text('slug', null, ['class' => 'form-control']) }}
		{{ $errors->first('slug', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('description', 'Description:') }}
		{{ Form::textarea('description', null, ['class' => 'form-control']) }}
		{{ $errors->first('description', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-6">
		{{ Form::label('permissions', 'Permissions:') }}
		{{ Form::select('permissions[]', $permissions, isset($permission_role) ? $permission_role : null, ['multiple' => 'multiple', 'class' => 'form-control']) }}
		{{ $errors->first('permissions', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group col-lg-12">
		{{ Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) }}
	</div>
{{ Form::close() }}