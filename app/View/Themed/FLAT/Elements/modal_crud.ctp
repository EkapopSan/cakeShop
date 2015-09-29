<div id="addModal" class="modal hide fade" data-backdrop="static">
    <div class="modal-body"></div>
    <div class="modal-footer">
        <div class="pull-left"></div>
        <button type="submit" class="btn btn-primary" onclick="$('#<?php echo Inflector::singularize($this->name); ?>AddForm').submit();"><i class="icon-save"></i> Save</button>
        <button type="reset" data-dismiss="modal" class="btn">Cancel</button>
    </div>
</div>

<div id="editModal" class="modal hide fade">
    <div class="modal-body"></div>
    <div class="modal-footer">
        <div class="pull-left"></div>
        <button type="submit" class="btn btn-primary" onclick="$('#<?php echo Inflector::singularize($this->name); ?>EditForm').submit();"><i class="icon-save"></i> Save</button>
        <button type="reset" data-dismiss="modal" class="btn">Cancel</button>
    </div>
</div>

<div id="deleteConfirm" class="modal hide fade">
    <div class="modal-body">
        Are you sure you want to delete?
    </div>
    <div class="modal-footer">
        <div class="pull-left"></div>
        <button type="submit" data-dismiss="modal" class="btn btn-danger"><i class="icon-trash"></i> Yes</button>
        <button type="reset" data-dismiss="modal" class="btn">No</button>
        <form id="<?php echo Inflector::singularize($this->name); ?>DeleteForm" method="post" action="/"></form>
    </div>
</div>
