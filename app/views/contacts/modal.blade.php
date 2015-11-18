<a data-toggle="modal" href="#modal-add-more">
  + Add More
</a>
<div id="modal-add-more" class="modal text-left fade">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Department</h4>
      </div>
      <div class="modal-body">
      {{ Form::open() }}
      <div class="form-group col-lg-12">
    {{ Form::label('dpt_name', 'Department Name:') }}
    {{ Form::text('dpt_name', null, ['class' => 'form-control']) }}
    
  </div>
      {{Form::close()}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="addDepartment()" >Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->