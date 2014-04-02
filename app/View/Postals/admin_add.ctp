<div class="postals form">
<?php echo $this->Form->create('Postal'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Postal'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Postals'), array('action' => 'index')); ?></li>
	</ul>
</div>
