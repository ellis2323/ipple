<div class="postals form">
<?php echo $this->Form->create('Postal'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Postal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('label');
		echo $this->Form->input('state');
		echo $this->Form->input('city_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Postal.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Postal.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Postals'), array('action' => 'index')); ?></li>
	</ul>
</div>
