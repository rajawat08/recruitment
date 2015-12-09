<a  href="javascript:;" onclick="openingsModal()" class="btn btn-info btn-xs" > Assign Openings </a>  
<div id="#opening-modal" class="modal text-left fade">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Openings</h4>
      </div>
      <div class="modal-body">
        {{ Form::model($data, ['method' => 'PUT', 'files' => true]) }}
         
         <div class="form-group col-lg-12">
          
          {{ Form::select('opening', $data,null, ['class' => 'form-control model-opening-select']) }}
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="assignOpenings()" >Assign</button>
      </div>
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->