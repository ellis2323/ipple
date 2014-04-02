<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['user_id']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Nb Bacs'); ?></dt>
		<dd>
			<?php echo h($order['Order']['nb_bacs']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($order['Order']['modified']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($order['Order']['state']); ?>
			&nbsp;
		</dd>


		<dt><?php echo __('Delivery'); ?></dt>
		<dd>
			<?php debug($delivery); ?>
			&nbsp;
		</dd>
	</dl>
</div>

