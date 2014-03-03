<?= $this->Form->create('Bacs'); ?>

<?= $this->Form->input('title', array(
									'type' => 'text',
                                    'label' => "Titre", 
                                    'class' => 'form-control',
                              		'value' => $bac['Bac']['title'],
                                    )); ?>
<?= $this->Form->input('description', array(
									'type' => 'textarea',
                                    'label' => "Description", 
                                    'class' => 'form-control',
                                    'value' => $bac['Bac']['description'],
                                    )); ?>

<?= $this->Form->end('Modifier'); ?>
