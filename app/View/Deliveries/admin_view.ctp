<div class="deliveries view">
<h2><?php echo __('Delivery'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($delivery['Delivery']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($delivery['Delivery']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($delivery['Order']['id'], array('controller' => 'orders', 'action' => 'view', $delivery['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($delivery['Delivery']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($delivery['Delivery']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Withdrawal'); ?></dt>
		<dd>
			<?php echo h($delivery['Delivery']['withdrawal']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Delivery'), array('action' => 'edit', $delivery['Delivery']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Delivery'), array('action' => 'delete', $delivery['Delivery']['id']), null, __('Are you sure you want to delete # %s?', $delivery['Delivery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Deliveries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
