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
			echo $bac['code']."<a href='".$this->Html->url(
				array(
					'controller'=>'deliveries', 
					'action' => 'delete_bac', 
					$delivery_id, $bac['id'], 
					'admin' => true, 
				)
			)."'>[X]</a> <br />";
		}

}
?>
<?= $this->Form->end('Ajouter bac'); ?>


