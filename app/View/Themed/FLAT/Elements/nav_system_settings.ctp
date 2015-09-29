<ul class="nav nav-list">
    <li class="<?php echo $this->view == 'index'? 'active':'' ; ?>">
        <a href="<?php echo $this->Html->url(array('controller' => 'configurations', 'action' => 'index')); ?>">Configurations</a>
    </li>
    <li class="<?php echo $this->view == 'cities'? 'active':'' ; ?>">
        <a href="<?php echo $this->Html->url(array('controller' => 'configurations', 'action' => 'cities')); ?>">Cities</a>
    </li>
</ul>
