<?php
debug($hours);

?>

<div class="deliveries form">
<?php echo $this->Form->create('Delivery'); ?>
	<fieldset>
		<legend><?php echo __('Date de dépôt'); ?></legend>
	<?php
		echo $this->Form->input('date', array('type' => 'date'));
		echo $this->Form->input('hour');

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
