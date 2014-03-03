<?= $this->Form->create('Users'); ?>

<?= $this->Form->input('firstname', array(
						'type' => 'text',
                                    'label' => "Prenom", 
                                    'class' => 'form-control',
                              		'value' => $user['User']['firstname'],
                                    )); 
?>


<?= $this->Form->input('lastname', array(
						'type' => 'text',
                                    'label' => "Nom", 
                                    'class' => 'form-control',
                                    'value' => $user['User']['lastname'],
                                    )); 
?>

<?= $this->Form->input('email', array(
                                    'type' => 'text',
                                    'label' => "Email", 
                                    'class' => 'form-control',
                                    'value' => $user['User']['email'],
                                    )); 
?>
<?= $this->Form->input('role', array(
                                    'type' => 'text',
                                    'label' => "Role", 
                                    'class' => 'form-control',
                                    'value' => $user['User']['role'],
                                    )); 
?>

<?= $this->Form->end('Modifier'); ?>
