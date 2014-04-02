<div class="params form">
<?php echo $this->Form->create('Param'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Param'); ?></legend>
	<?php
		echo $this->Form->input('key');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Params'), array('action' => 'index')); ?></li>
	</ul>
</div>
