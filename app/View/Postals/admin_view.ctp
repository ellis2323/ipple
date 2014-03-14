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
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Addresses'); ?></h3>
	<?php if (!empty($postal['Address'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Company'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Floor'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Digicode'); ?></th>
		<th><?php echo __('Postal Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($postal['Address'] as $address): ?>
		<tr>
			<td><?php echo $address['id']; ?></td>
			<td><?php echo $address['firstname']; ?></td>
			<td><?php echo $address['lastname']; ?></td>
			<td><?php echo $address['phone']; ?></td>
			<td><?php echo $address['company']; ?></td>
			<td><?php echo $address['street']; ?></td>
			<td><?php echo $address['floor']; ?></td>
			<td><?php echo $address['comment']; ?></td>
			<td><?php echo $address['digicode']; ?></td>
			<td><?php echo $address['postal_id']; ?></td>
			<td><?php echo $address['city_id']; ?></td>
			<td><?php echo $address['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'addresses', 'action' => 'view', $address['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'addresses', 'action' => 'edit', $address['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'addresses', 'action' => 'delete', $address['id']), null, __('Are you sure you want to delete # %s?', $address['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
