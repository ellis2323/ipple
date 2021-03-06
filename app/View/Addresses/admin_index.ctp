<div class="addresses index">
	<h2><?php echo __('Addresses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('firstname'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('postal'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('digicode'); ?></th>
			<th><?php echo $this->Paginator->sort('etage'); ?></th>
			<th><?php echo $this->Paginator->sort('tel'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($addresses as $address): ?>
	<tr>
		<td><?php echo h($address['Address']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($address['User']['email'], array('controller' => 'users', 'action' => 'view', $address['User']['id'])); ?>
		</td>
		<td><?php echo h($address['Address']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['city']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['postal']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['street']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['number']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['digicode']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['etage']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['tel']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['comment']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $address['Address']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $address['Address']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
