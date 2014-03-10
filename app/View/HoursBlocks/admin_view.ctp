<div class="hoursBlocks view">
<h2><?php echo __('Hours Block'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hoursBlock['HoursBlock']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hour Id'); ?></dt>
		<dd>
			<?php echo h($hoursBlock['HoursBlock']['hour_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hours Block'), array('action' => 'edit', $hoursBlock['HoursBlock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hours Block'), array('action' => 'delete', $hoursBlock['HoursBlock']['id']), null, __('Are you sure you want to delete # %s?', $hoursBlock['HoursBlock']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hours Blocks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hours Block'), array('action' => 'add')); ?> </li>
	</ul>
</div>
