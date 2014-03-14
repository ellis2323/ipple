<div class="postals form">
<?php echo $this->Form->create('Postal'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Postal'); ?></legend>
	<?php
		echo $this->Form->input('label', array('label' => 'Code postal'));
		echo $this->Form->input('cities', array('label' => 'Ville'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Postals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
