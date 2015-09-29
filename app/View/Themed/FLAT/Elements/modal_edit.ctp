<div id="editModal" class="modal hide fade">
    <div class="modal-body"></div>
    <div class="modal-footer">
        <div class="pull-left"></div>
        <button type="submit" class="btn btn-primary" onclick="$('#<?php echo Inflector::singularize($this->name); ?>EditForm').submit();"><i class="icon-save"></i> Save</button>
        <button type="reset" data-dismiss="modal" class="btn">Cancel</button>
    </div>
</div>
