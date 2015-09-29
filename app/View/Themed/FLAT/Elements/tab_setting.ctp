<?php
$nav_user = array('Users');
$nav_group = array('Groups');
$nav_role = array('Roles');
$nav_company = array('Companies');
$nav_configuration = array('Configurations');
?>
<ul class="nav nav-tabs">
    <li class="<?php echo (in_array($this->name, $nav_user) ? 'active':''); ?>">
        <a href="<?php echo (!in_array($this->name, $nav_user) ? $this->Html->url(array('controller' => 'users')) : '#'); ?>">
            <i class="glyphicon-user"></i> Users</a>
    </li>
    <li class="<?php echo (in_array($this->name, $nav_group) ? 'active':''); ?>">
        <a href="<?php echo (!in_array($this->name, $nav_group) ? $this->Html->url(array('controller' => 'groups')) : '#'); ?>">
            <i class="glyphicon-group"></i> Groups</a>
    </li>
    <li class="<?php echo (in_array($this->name, $nav_role) ? 'active':''); ?>">
        <a href="<?php echo (!in_array($this->name, $nav_role) ? $this->Html->url(array('controller' => 'roles')) : '#'); ?>">
            <i class="glyphicon-check"></i> Roles Settings</a>
    </li>
    <li class="<?php echo (in_array($this->name, $nav_company) ? 'active':''); ?>">
        <a href="<?php echo (!in_array($this->name, $nav_company) ? $this->Html->url(array('controller' => 'companies')) : '#'); ?>">
            <i class="glyphicon-building"></i> Company Info</a>
    </li>
    <li class="<?php echo (in_array($this->name, $nav_configuration) ? 'active':''); ?>">
        <a href="<?php echo (!in_array($this->name, $nav_configuration) ? $this->Html->url(array('controller' => 'configurations', 'action' => 'index')) : '#'); ?>">
            <i class="glyphicon-adjust_alt"></i> System Settings</a>
    </li>
    <?php echo $this->element('caption_settings', array('options' => (isset($options)?$options:null))); ?>
</ul>
<?php echo $this->Html->script('box-title-tab'); ?>