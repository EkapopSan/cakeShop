<?php $options = array(
        'addBtn' => $this->Html->link(__('<i class="glyphicon-group"></i> New Group'), 
                    array('action' => 'add'),
                    array(
                        'type' => 'button', 
                        'class' => 'btn btn-primary', 
                        'role' => 'button',
                        'data-toggle' => 'modal',
                        'data-target' => '#addModal',
                        'escape' => false
                    )
                )
        ); 
?>
<div class="row-fluid">
    <div class="box">
        <div class="box-title">
            <?php echo $this->element('tab_setting', array('options' => $options)); ?>
            <h3><i class="glyphicon-group"></i>Groups</h3>
            <div class="pull-left"><?php echo $this->element('search-form'); ?></div>
            <div class="pull-right"><?php echo $this->element('paginator'); ?></div>
            <div class="pull-right"><?php echo $this->element('page-counter'); ?></div>
        </div>
        <div class="box-content">
            <div class="span12">
                <table class="table table-hover table-nomargin table-condensed">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('name'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($groups as $group): ?>
                        <tr>
                            <td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
                            <td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
                            <td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
                            <td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
                            <td class="actions">
                                <div class="btn-group">
                                    <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <?php 
                                  echo $this->Html->link(__('<i class="icon-pencil"></i> Edit'),
                                      array('controller' => 'groups', 'action' => 'edit', $group['Group']['id']),
                                      array(
                                          'type' => 'button', 
                                          'class' => '', 
                                          'role' => 'button',
                                          'data-toggle' => 'modal',
                                          'data-target' => '#editModal',
                                          'escape' => false
                                      )
                                  ); 
                                            ?>
                                        </li>
                                        <li>
                                            <?php 
                                  echo $this->Html->link(__('<i class="icon-trash"></i> Delete'),
                                        '#',
                                        array(
                                          'type' => 'button', 
                                          'class' => 'btnDeleteGroup',
                                          'role' => 'button',
                                          'data-toggle' => 'modal',
                                          'data-target' => '#deleteConfirm',
                                          'onclick' => 'setGroupDeleteFormURL(\''.$this->Html->url(array('controller' => 'groups', 'action' => 'delete', $group['Group']['id'])).'\');',
                                          'escape' => false
                                        )
                                      );
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('modal_crud'); ?>
<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<script>
    $.ajaxSetup({
        // Disable caching of AJAX responses
        cache: true
    });
</script>
<?php echo $this->Html->script('group.index'); ?>