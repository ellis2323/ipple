<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['User']['email'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Address']['street'], array('controller' => 'addresses', 'action' => 'view', $order['Address']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Deposit'); ?></dt>
		<dd>
			<?php echo h($order['Order']['date_deposit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hour Deposit'); ?></dt>
		<dd>
			<?php echo h($order['Order']['hour_deposit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State Deposit'); ?></dt>
		<dd>
			<?php echo h($order['Order']['state_deposit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Concierge Deposit'); ?></dt>
		<dd>
			<?php echo h($order['Order']['concierge_deposit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Withdrawal'); ?></dt>
		<dd>
			<?php echo h($order['Order']['date_withdrawal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hour Withdrawal'); ?></dt>
		<dd>
			<?php echo h($order['Order']['hour_withdrawal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State Withdrawal'); ?></dt>
		<dd>
			<?php echo h($order['Order']['state_withdrawal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Concierge Withdrawal'); ?></dt>
		<dd>
			<?php echo h($order['Order']['concierge_withdrawal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nb Bacs'); ?></dt>
		<dd>
			<?php echo h($order['Order']['nb_bacs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($order['Order']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($order['Order']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), null, __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Bac Rs'); ?></h3>
	<?php if (!empty($order['BacR'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Bac Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($order['BacR'] as $bacR): ?>
		<tr>
			<td><?php echo $bacR['id']; ?></td>
			<td><?php echo $bacR['bac_id']; ?></td>
			<td><?php echo $bacR['order_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bac_rs', 'action' => 'view', $bacR['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bac_rs', 'action' => 'edit', $bacR['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bac_rs', 'action' => 'delete', $bacR['id']), null, __('Are you sure you want to delete # %s?', $bacR['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bac R'), array('controller' => 'bac_rs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Bacs'); ?></h3>
	<?php if (!empty($order['Bac'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Media Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($order['Bac'] as $bac): ?>
		<tr>
			<td><?php echo $bac['id']; ?></td>
			<td><?php echo $bac['media_id']; ?></td>
			<td><?php echo $bac['user_id']; ?></td>
			<td><?php echo $bac['title']; ?></td>
			<td><?php echo $bac['description']; ?></td>
			<td><?php echo $bac['modified']; ?></td>
			<td><?php echo $bac['created']; ?></td>
			<td><?php echo $bac['state']; ?></td>
			<td><?php echo $bac['code']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bacs', 'action' => 'view', $bac['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bacs', 'action' => 'edit', $bac['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bacs', 'action' => 'delete', $bac['id']), null, __('Are you sure you want to delete # %s?', $bac['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bac'), array('controller' => 'bacs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
