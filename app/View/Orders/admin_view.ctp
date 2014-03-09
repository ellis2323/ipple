<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['user_id']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Nb Bacs'); ?></dt>
		<dd>
			<?php echo h($order['Order']['nb_bacs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date_deposit'); ?></dt>
		<dd>
			<?php echo h($order['Order']['date_deposit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hour_deposit'); ?></dt>
		<dd>
			<?php echo h($order['Order']['hour_deposit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date_withdrawal'); ?></dt>
		<dd>
			<?php echo h($order['Order']['date_withdrawal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hour_withdrawal'); ?></dt>
		<dd>
			<?php echo h($order['Order']['hour_withdrawal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($order['Order']['state']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

			<li><?php echo $this->Html->link(__('Associer bacs'), array('controller' => 'orders', 'action' => 'add_bac', $order['Order']['id'])); ?> </li>

		<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), null, __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deliveries'), array('controller' => 'deliveries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deliveries'), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Deliveries'); ?></h3>
	<?php if (!empty($order['Deliveries'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Withdrawal'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($order['Deliveries'] as $deliveries): ?>
		<tr>
			<td><?php echo $deliveries['id']; ?></td>
			<td><?php echo $deliveries['user_id']; ?></td>
			<td><?php echo $deliveries['order_id']; ?></td>
			<td><?php echo $deliveries['date']; ?></td>
			<td><?php echo $deliveries['state']; ?></td>
			<td><?php echo $deliveries['withdrawal']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'deliveries', 'action' => 'view', $deliveries['id'])); ?>
				
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'deliveries', 'action' => 'edit', $deliveries['id'])); ?>

				<?php echo $this->Html->link(__('Confirm'), array('controller' => 'deliveries', 'action' => 'confirm', $deliveries['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'deliveries', 'action' => 'delete', $deliveries['id']), null, __('Are you sure you want to delete # %s?', $deliveries['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Deliveries'), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
