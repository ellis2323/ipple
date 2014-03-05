<div class="deliveries form">
<?php echo $this->Form->create('Delivery'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Delivery'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('order_id');
		echo $this->Form->input('date');
		echo $this->Form->input('state');
		echo $this->Form->input('withdrawal');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Deliveries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
