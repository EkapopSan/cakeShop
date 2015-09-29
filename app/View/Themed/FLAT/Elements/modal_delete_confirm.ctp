<div id="deleteConfirm" class="modal hide fade">
    <div class="modal-body">
        Are you sure you want to delete?
    </div>
    <div class="modal-footer">
        <?php 
        echo $this->Form->postLink(
            __('<i class="icon-trash"></i> Delete'), 
              array('action' => 'delete', $id), 
              array(
                  'type' => 'button', 
                  'class' => 'btn btn-danger', 
                  'escape' => false
            )
          ); ?>
        <button type="reset" data-dismiss="modal" class="btn">Cancel</button>
    </div>
</div>
