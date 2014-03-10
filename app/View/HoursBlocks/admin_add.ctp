<div class="hoursBlocks form">
<?php echo $this->Form->create('HoursBlock'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Hours Block'); ?></legend>
	<?php
		echo $this->Form->input('hour_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Hours Blocks'), array('action' => 'index')); ?></li>
	</ul>
</div>
