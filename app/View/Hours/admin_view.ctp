<div class="hours view">
<h2><?php echo __('Hour'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Hour'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['start_hour']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Hour'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['end_hour']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['state']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hour'), array('action' => 'edit', $hour['Hour']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hour'), array('action' => 'delete', $hour['Hour']['id']), null, __('Are you sure you want to delete # %s?', $hour['Hour']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hours'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hour'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deliveries'), array('controller' => 'deliveries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery'), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Deliveries'); ?></h3>
	<?php if (!empty($hour['Delivery'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Delivery Id'); ?></th>
		<th><?php echo __('Address Id'); ?></th>
		<th><?php echo __('Hour Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Bac Delivery Count'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hour['Delivery'] as $delivery): ?>
		<tr>
			<td><?php echo $delivery['id']; ?></td>
			<td><?php echo $delivery['date']; ?></td>
			<td><?php echo $delivery['state']; ?></td>
			<td><?php echo $delivery['delivery_id']; ?></td>
			<td><?php echo $delivery['address_id']; ?></td>
			<td><?php echo $delivery['hour_id']; ?></td>
			<td><?php echo $delivery['order_id']; ?></td>
			<td><?php echo $delivery['user_id']; ?></td>
			<td><?php echo $delivery['bac_delivery_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'deliveries', 'action' => 'view', $delivery['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'deliveries', 'action' => 'edit', $delivery['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'deliveries', 'action' => 'delete', $delivery['id']), null, __('Are you sure you want to delete # %s?', $delivery['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Delivery'), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($hour['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Delivery Id'); ?></th>
		<th><?php echo __('Address Id'); ?></th>
		<th><?php echo __('Date Deposit'); ?></th>
		<th><?php echo __('Hour Deposit'); ?></th>
		<th><?php echo __('Date Withdrawal'); ?></th>
		<th><?php echo __('Hour Withdrawal'); ?></th>
		<th><?php echo __('Nb Bacs'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hour['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['user_id']; ?></td>
			<td><?php echo $order['delivery_id']; ?></td>
			<td><?php echo $order['address_id']; ?></td>
			<td><?php echo $order['date_deposit']; ?></td>
			<td><?php echo $order['hour_deposit']; ?></td>
			<td><?php echo $order['date_withdrawal']; ?></td>
			<td><?php echo $order['hour_withdrawal']; ?></td>
			<td><?php echo $order['nb_bacs']; ?></td>
			<td><?php echo $order['state']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
