<div class="locks view">
<h2><?php echo __('Bac'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bac['Bac']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($bac['Bac']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bac['Bac']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bac['Bac']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bac'), array('action' => 'edit', $bac['Bac']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bac'), array('action' => 'delete', $bac['Bac']['id']), null, __('Are you sure you want to delete # %s?', $bac['Bac']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Bac'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bacs'), array('controller' => 'bacs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bac'), array('controller' => 'bacs', 'action' => 'add')); ?> </li>
	</ul>
</div>
