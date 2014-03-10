<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Order'); ?></legend>
	<?php
		echo $this->Form->input('users');
		echo $this->Form->input('nb_bacs');
		echo $this->Form->input('state');

		debug($users);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Deliveries'), array('controller' => 'deliveries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deliveries'), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
	</ul>
</div>
