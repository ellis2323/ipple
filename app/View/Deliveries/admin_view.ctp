<div class="deliveries view">
<h2><?php echo __('Livraison'); ?></h2>
	<dl>
		<dt><?php echo __('#ID'); ?></dt>
		<dd>
			<?php echo h($delivery['Delivery']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Utilisateur'); ?></dt>
		<dd>
			<?php $user =  $user['User']['email'];
			echo h($user); 
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('ID Commande'); ?></dt>
		<dd>
			<?php echo $this->Html->link($delivery['Delivery']['order_id'], array('controller' => 'orders', 'action' => 'view', $delivery['Delivery']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php	
			$date_brut = $delivery['Delivery']['date']; 
			$date = date_parse_from_format('Y m d',$date_brut);

			//debug($date);
			echo $date['day']."/".$date['month']."/".$date['year'];



			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etat de la commande'); ?></dt>
		<dd>
			<?php echo h($delivery['Delivery']['state']); ?>
			&nbsp;
		</dd>

	</dl>



</div>
<?php if(!empty($delivery_return)):?>
<div class="deliveries view">
<h2><?php echo __('Livraison retour'); ?></h2>
	<dl>
		<dt><?php echo __('#ID'); ?></dt>
		<dd>
			<?php echo h($delivery_return['Delivery']['id']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('ID Commande'); ?></dt>
		<dd>
			<?php echo $this->Html->link($delivery_return['Delivery']['order_id'], array('controller' => 'orders', 'action' => 'view', $delivery['Delivery']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php	
			$date_brut = $delivery['Delivery']['date']; 
			$date = date_parse_from_format('Y m d',$date_brut);

			//debug($date);
			echo $date['day']."/".$date['month']."/".$date['year'];



			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etat de la commande'); ?></dt>
		<dd>
			<?php echo h($delivery_return['Delivery']['state']); ?>
			&nbsp;
		</dd>

	</dl>



</div>
<?php endif;?>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Associer bacs'), array('controller' => 'orders', 'action' => 'add_bac', $delivery['Order']['id'])); ?> </li>

		<li><?php echo $this->Html->link(__('Editer la livraison'), array('action' => 'edit', $delivery['Delivery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des livraisons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des commandes'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
	</ul>
</div>
