<?= $this->Form->create('Delivery'); ?>

<?php
echo $this->Form->input('Bac.code', array(
		                                                'class' => 'form-control',
		                                                'label' => false
		                          	));
?> 

<?php
if(!empty($bacs)){
		foreach($bacs as $bac){
			echo $bac['Bac']['code']."<a href='".$this->Html->url(array('controller'=>'orders', 'action' => 'delete_bac', $bac['Bac']['order_id'], $bac['Bac']['id'], 'admin' => true, ))."'>[X]</a> <br />";
		}

}
?>
<?= $this->Form->end('Ajouter bac'); ?>


