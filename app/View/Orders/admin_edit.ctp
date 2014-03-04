<?= $this->Form->create('Orders'); ?>

<?= $this->Form->input('id', array(
						'type' => 'text',
                                    'label' => "Id de la commande", 
                                    'class' => 'form-control',
                              		'value' => $order['Order']['id'],
                                    )); 
?>


<?= $this->Form->input('user_id', array(
						'type' => 'text',
                                    'label' => "Id du propriétaire", 
                                    'class' => 'form-control',
                                    'value' => $order['Order']['user_id'],
                                    )); 
?>

<?= $this->Form->input('user_id', array(
                                    'type' => 'text',
                                    'label' => "Nombre de bacs", 
                                    'class' => 'form-control',
                                    'value' => $order['Order']['nb_bacs'],
                                    )); 
?>

<?= $this->Form->input('user_id', array(
                                    'type' => 'text',
                                    'label' => "Etat", 
                                    'class' => 'form-control',
                                    'value' => $order['Order']['state'],
                                    )); 
?>

<?= $this->Form->end('Modifier'); ?>
