<div class="hoursBlocks index">
	<h2><?php echo __('Hours Blocks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('hour_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hoursBlocks as $hoursBlock): ?>
	<tr>
		<td><?php echo h($hoursBlock['HoursBlock']['id']); ?>&nbsp;</td>
		<td><?php echo h($hoursBlock['HoursBlock']['hour_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hoursBlock['HoursBlock']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hoursBlock['HoursBlock']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hoursBlock['HoursBlock']['id']), null, __('Are you sure you want to delete # %s?', $hoursBlock['HoursBlock']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Hours Block'), array('action' => 'add')); ?></li>
	</ul>
</div>
