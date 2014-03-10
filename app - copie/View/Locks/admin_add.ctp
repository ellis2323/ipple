<div class="locks form">
<?php echo $this->Form->create('Lock'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Lock'); ?></legend>
	<?php
		echo $this->Form->input('bac_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Locks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bacs'), array('controller' => 'bacs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bac'), array('controller' => 'bacs', 'action' => 'add')); ?> </li>
	</ul>
</div>
