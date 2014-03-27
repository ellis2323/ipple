<div class="postals view">
<h2><?php echo __('Postal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($postal['Postal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($postal['Postal']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($postal['Postal']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City Id'); ?></dt>
		<dd>
			<?php echo h($postal['Postal']['city_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Postal'), array('action' => 'edit', $postal['Postal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Postal'), array('action' => 'delete', $postal['Postal']['id']), null, __('Are you sure you want to delete # %s?', $postal['Postal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Postals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postal'), array('action' => 'add')); ?> </li>
	</ul>
</div>
