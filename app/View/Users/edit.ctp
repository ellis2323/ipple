<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('password');
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

