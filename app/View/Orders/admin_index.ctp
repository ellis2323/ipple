<div class="orders index">
	<h2><?php echo __('Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('address_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_deposit'); ?></th>
			<th><?php echo $this->Paginator->sort('hour_deposit'); ?></th>
			<th><?php echo $this->Paginator->sort('state_deposit'); ?></th>
			<th><?php echo $this->Paginator->sort('concierge_deposit'); ?></th>
			<th><?php echo $this->Paginator->sort('date_withdrawal'); ?></th>
			<th><?php echo $this->Paginator->sort('hour_withdrawal'); ?></th>
			<th><?php echo $this->Paginator->sort('state_withdrawal'); ?></th>
			<th><?php echo $this->Paginator->sort('concierge_withdrawal'); ?></th>
			<th><?php echo $this->Paginator->sort('nb_bacs'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo h($order['Order']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['User']['email'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['Address']['street'], array('controller' => 'addresses', 'action' => 'view', $order['Address']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['date_deposit']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['hour_deposit']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['state_deposit']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['concierge_deposit']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['date_withdrawal']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['hour_withdrawal']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['state_withdrawal']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['concierge_withdrawal']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['nb_bacs']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['state']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $order['Order']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), null, __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?></li>
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
