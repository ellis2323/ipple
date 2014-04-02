<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Order'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('address_id');
		echo $this->Form->input('date_deposit');
		echo $this->Form->input('hour_deposit');
		echo $this->Form->input('state_deposit');
		echo $this->Form->input('concierge_deposit');
		echo $this->Form->input('date_withdrawal');
		echo $this->Form->input('hour_withdrawal');
		echo $this->Form->input('state_withdrawal');
		echo $this->Form->input('concierge_withdrawal');
		echo $this->Form->input('nb_bacs');
		echo $this->Form->input('state');
		echo $this->Form->input('Bac');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bac Rs'), array('controller' => 'bac_rs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bac R'), array('controller' => 'bac_rs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bacs'), array('controller' => 'bacs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bac'), array('controller' => 'bacs', 'action' => 'add')); ?> </li>
	</ul>
</div>
