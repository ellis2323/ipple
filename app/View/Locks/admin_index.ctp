<div class="locks index">
	<h2><?php echo __('Locks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('bac_id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($locks as $lock): ?>
	<tr>
		<td><?php echo h($lock['Lock']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($lock['Bac']['title'], array('controller' => 'bacs', 'action' => 'view', $lock['Bac']['id'])); ?>
		</td>
		<td><?php echo h($lock['Lock']['code']); ?>&nbsp;</td>
		<td><?php echo h($lock['Lock']['created']); ?>&nbsp;</td>
		<td><?php echo h($lock['Lock']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $lock['Lock']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $lock['Lock']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $lock['Lock']['id']), null, __('Are you sure you want to delete # %s?', $lock['Lock']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Lock'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bacs'), array('controller' => 'bacs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bac'), array('controller' => 'bacs', 'action' => 'add')); ?> </li>
	</ul>
</div>
