<table class="table table-hover table-nomargin table-condensed">
    <thead>
        <tr> 
            <?php foreach ($options['columns'] as $column): ?>
            <th><?php echo $this->Paginator->sort($column); ?></th>
            <?php endforeach; ?>
            <?php if(isset($options['actions'])) { ?>
            <th class="actions"><?php echo __('Actions'); ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($options['obj'] as $obj): ?>
        <tr>
            <?php foreach ($options['fields'] as $fields): ?>

            <?php            
            if(is_array($fields)) {
                foreach ($fields as $key => $value)
                {
                    echo '<td>' . $obj[$key][$value] . '</td>';
                }
            } else {
                echo '<td>' . h($obj[Inflector::singularize($this->name)][$fields]) . '</td>';
            }
            ?>
            <?php endforeach; ?>
            <td class="actions">
                <div class="btn-group">
                    <?php 
                    echo (in_array('view', $options['actions']) ?
                        $this->Html->link(
                            __('<i class="icon-folder-open-alt"></i> View'), 
                            array('action' => 'view', $obj[Inflector::singularize($this->name)]['id']), 
                            array('class' => 'btn', 'escape' => false)
                        ) : '')
                    ?>
                    <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><?php echo (in_array('view', $options['actions']) ? '':'Action ') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if (in_array('edit', $options['actions'])) { ?>
                        <li>
                            <?php
                              echo $this->Html->link(__('<i class="icon-pencil"></i> Edit'),
                                  array('action' => 'edit', $obj[Inflector::singularize($this->name)]['id']),
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
                        <?php } ?>

                        <?php if(in_array('delete', $options['actions'])) { ?>
                        <li>
                            <?php 
                              echo $this->Html->link(__('<i class="icon-trash"></i> Delete'),
                                    '#',
                                    array(
                                      'type' => 'button', 
                                      'class' => 'btnDelete'.Inflector::singularize($this->name),
                                      'role' => 'button',
                                      'data-toggle' => 'modal',
                                      'data-target' => '#deleteConfirm',
                                      'onclick' => 'set'.Inflector::singularize($this->name).'DeleteFormURL(\''.$this->Html->url(array('controller' => strtolower($this->name), 'action' => 'delete', $obj[Inflector::singularize($this->name)]['id'])).'\');',
                                      'escape' => false
                                    )
                                  );
                            ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
