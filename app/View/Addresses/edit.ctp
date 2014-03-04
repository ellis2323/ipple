<?= $this->Form->create('Addresses'); ?>

<?= $this->Form->input('firstname', array(
									'type' => 'text',
                                    'label' => "Nom", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['firstname'],
)); ?>

<?= $this->Form->input('lastname', array(
									'type' => 'text',
                                    'label' => "Prénom", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['lastname'],
)); ?>

<?= $this->Form->input('city', array(
									'type' => 'text',
                                    'label' => "Ville", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['city'],
)); ?>

<?= $this->Form->input('postal', array(
									'type' => 'text',
                                    'label' => "Code postal", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['postal'],
)); ?>

<?= $this->Form->input('number', array(
									'type' => 'number',
                                    'label' => "Numéro de rue", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['number'],
)); ?>

<?= $this->Form->input('street', array(
									'type' => 'text',
                                    'label' => "Rue", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['street'],
)); ?>

<?= $this->Form->input('digicode', array(
									'type' => 'number',
                                    'label' => "Digicode", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['digicode'],
)); ?>

<?= $this->Form->input('etage', array(
									'type' => 'number',
                                    'label' => "Etage", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['etage'],
)); ?>

<?= $this->Form->input('tel', array(
									'type' => 'number',
                                    'label' => "Telephone", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['tel'],
)); ?>

<?= $this->Form->input('comment', array(
									'type' => 'textarea',
                                    'label' => "Commentaire", 
                                    'class' => 'form-control',
                              		'value' => $address['Address']['comment'],
)); ?>




<?= $this->Form->end('Modifier'); ?>
