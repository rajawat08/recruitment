<a data-toggle="modal" href="#modal-edit-{{ $data->id }}">
  Edit
</a>
<div id="modal-edit-{{ $data->id }}" class="modal text-left fade">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Role</h4>
      </div>
      <div class="modal-body">
        {{ Form::model($data, ['method' => 'PUT', 'files' => true, 'route' => ['roles.update', $data->id]]) }}
       <div class="form-group col-lg-12">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    {{ $errors->first('name', '<div class="text-danger">:message</div>') }}
  </div>
  <div class="form-group col-lg-12">
    {{ Form::label('slug', 'Alias:') }}
    {{ Form::text('slug', null, ['class' => 'form-control']) }}
    {{ $errors->first('slug', '<div class="text-danger">:message</div>') }}
  </div>
  <div class="form-group col-lg-12">
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'cols' =>'50' , 'rows' =>'4']) }}
    {{ $errors->first('description', '<div class="text-danger">:message</div>') }}
  </div>
  <div class="form-group col-lg-12">
    {{ Form::label('permissions', 'Permissions:') }}
    {{ Form::select('permissions[]', $permissions, isset($permission_role) ? $permission_role : $data->permissions->lists('id'), ['multiple' => 'multiple', 'class' => 'form-control']) }}
    {{ $errors->first('permissions', '<div class="text-danger">:message</div>') }}
  </div>
      </div>
      <div class="modal-footer">
       
        {{ Form::submit(isset($data) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->