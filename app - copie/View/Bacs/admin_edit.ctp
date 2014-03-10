<?= $this->Form->create('Bacs'); ?>

<?= $this->Form->input('id', array(
						'type' => 'text',
                                    'label' => "Id du bac", 
                                    'class' => 'form-control',
                              		'value' => $bac['Bac']['id'],
                                    )); 
?>

<?= $this->Form->input('code', array(
                                    'type' => 'text',
                                    'label' => "Code du bac", 
                                    'class' => 'form-control',
                                    'value' => $bac['Bac']['code'],
                                    )); 
?>

<?php 
if(empty($bac['Bac']['order_id'])):
?>
<h1>Bac non associé</h1>
<?php
else:
?>
<h1>Bac associé</h1>
<?php
endif;
?>

<?= $this->Form->input('orders', array(
                                          'default' => $bac['Bac']['order_id'])
      ); 

?>




<?= $this->Form->end('Modifier'); ?>
