<div class="hours form">
<?php echo $this->Form->create('Hour'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Hour'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('start_hour');
		echo $this->Form->input('end_hour');
		echo $this->Form->input('state');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Hour.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Hour.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Hours'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Deliveries'), array('controller' => 'deliveries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery'), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
