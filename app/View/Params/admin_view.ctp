<div class="params view">
<h2><?php echo __('Param'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($param['Param']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($param['Param']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($param['Param']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Param'), array('action' => 'edit', $param['Param']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Param'), array('action' => 'delete', $param['Param']['id']), null, __('Are you sure you want to delete # %s?', $param['Param']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Params'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Param'), array('action' => 'add')); ?> </li>
	</ul>
</div>
