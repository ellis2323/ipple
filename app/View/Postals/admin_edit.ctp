<div class="postals form">
<?php echo $this->Form->create('Postal'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Postal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('label', array('label' => 'Code postal'));
		echo $this->Form->input('cities', array('label' => 'Ville', 'default' => $this->request->data['Postal']['city_id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Postal.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Postal.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Postals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
