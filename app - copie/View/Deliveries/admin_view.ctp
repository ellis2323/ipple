<div class="deliveries view">
<h2><?php echo __('Livraison'); ?></h2>


ID :<?= $delivery['Delivery']['id'];?><br />
Etat :<?= $delivery['Delivery']['date'];?><br />
Date :<?= $delivery['Delivery']['state'];?><br />

<?php
if(!empty($delivery['DeliveryReturn'])){
?>
	<h2><?php echo __('Livraison retour'); ?></h2>
	ID :<?= $delivery['DeliveryReturn']['id'];?><br />
	Date :<?= $delivery['DeliveryReturn']['date'];?><br />
	Etat :<?= $delivery['DeliveryReturn']['state'];?><br />

<?php
}
?>

</div>


<?php
if(!empty($bacs)){
?>	
<h1>Bacs associés</h1>

<?php
		foreach($bacs as $bac){
			echo $bac['code']."<a href='".$this->Html->url(
				array(
					'controller'=>'deliveries', 
					'action' => 'delete_bac', 
					$id, $bac['id'], 
					'admin' => true, 
				)
			)."'>[X]</a> <br />";
		}

}
else{
?>
<h1>Aucun bac associé</h1>

<?php
}
?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Associer bacs'), array('controller' => 'deliveries', 'action' => 'add_bac', $delivery['Delivery']['id'])); ?> </li>

		<li><?php echo $this->Html->link(__('Editer la livraison'), array('action' => 'edit', $delivery['Delivery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des livraisons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des commandes'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
	</ul>
</div>
