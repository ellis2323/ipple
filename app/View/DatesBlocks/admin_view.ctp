<div class="datesBlocks view">
<h2><?php echo __('Dates Block'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($datesBlock['DatesBlock']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($datesBlock['DatesBlock']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($datesBlock['DatesBlock']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dates Block'), array('action' => 'edit', $datesBlock['DatesBlock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dates Block'), array('action' => 'delete', $datesBlock['DatesBlock']['id']), null, __('Are you sure you want to delete # %s?', $datesBlock['DatesBlock']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dates Blocks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dates Block'), array('action' => 'add')); ?> </li>
	</ul>
</div>
