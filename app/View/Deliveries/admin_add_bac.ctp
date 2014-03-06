<?= $this->Form->create('Delivery'); ?>

<?php
echo $this->Form->input('Bac.code', array(
		                                                'class' => 'form-control',
		                                                'label' => false
		                          	));
?> 

<?php
if(!empty($bacs)){
	
	foreach($bacs as $key){
			echo $key."<br />";
	}


}
?>
<?= $this->Form->end('Ajouter bac'); ?>


