<div class="deliveries index">
	<h2><?php echo __('Deliveries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('delivery_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($deliveries as $delivery): ?>
	<tr>
		<td><?php echo h($delivery['Delivery']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($delivery['Delivery']['id'], array('controller' => 'orders', 'action' => 'view', $delivery['Delivery']['id'])); ?>
		</td>
		<td><?php echo h($delivery['Delivery']['date']); ?>&nbsp;</td>
		<td><?php echo h($delivery['Delivery']['state']); ?>&nbsp;</td>
		<td><?php echo h($delivery['Delivery']['delivery_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $delivery['Delivery']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $delivery['Delivery']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $delivery['Delivery']['id']), null, __('Are you sure you want to delete # %s?', $delivery['Delivery']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Delivery'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
