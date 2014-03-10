<?= $this->Form->create('Users'); ?>

<?= $this->Form->input('email', array(
						'type'       => 'text',
                                    'label'      => "Email", 
                                    'class'      => 'form-control',
                              	'value'      => $user['User']['email'],
                                    )); ?>
<?= $this->Form->input('password', array(
						'type'      => 'password',
                                    'label'     => "Mot de passe", 
                                    'class'     => 'form-control',
                                    'value'     => NULL
                                    )); ?>

<?= $this->Form->end('Modifier'); ?>
