<a data-toggle="modal" href="#modal-add-position">
  + Add Position
</a>
<div id="modal-add-position" class="modal text-left fade">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Position</h4>
      </div>
      <div class="modal-body">
    
      <div class="form-group col-lg-12">
    {{ Form::label('pos_name', 'New Position:') }}
    {{ Form::text('pos_name', null, ['class' => 'form-control']) }}
    
  </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="addPosition()" >Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->