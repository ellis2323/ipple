<?= $this->Form->create('Orders'); ?>

<?= $this->Form->input('nb_bacs', array(
						'type' => 'number',
                                    'label' => "Nombre de bacs", 
                                    'class' => 'form-control',
                              	'value' => $order['Order']['nb_bacs'],
)); ?>

<?= $this->Form->end('Modifier'); ?>
