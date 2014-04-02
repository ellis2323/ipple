<?= $this->Form->create('Order'); ?>

<?php
echo $this->Form->input('Bac.code', array(
		                                                'class' => 'form-control',
		                                                'label' => false
		                          	));
?> 

<?php
if(!empty($bacs)){
		foreach($bacs as $bac){
			echo $bac['code']."<a href='".$this->Html->url(array('controller'=>'orders', 'action' => 'delete_bac', $bac['BacsOrder']['order_id'], $bac['id'], 'admin' => true, ))."'>[X]</a> <br />";
		}

}
?>
<?= $this->Form->end('Ajouter bac'); ?>


