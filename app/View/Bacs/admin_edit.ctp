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




<?= $this->Form->input('title', array(
                                    'type' => 'text',
                                    'label' => "Email", 
                                    'class' => 'form-control',
                                    'value' => $bac['Bac']['title'],
                                    )); 
?>
<?= $this->Form->input('description', array(
                                    'type' => 'textarea',
                                    'label' => "Description", 
                                    'class' => 'form-control',
                                    'value' => $bac['Bac']['description'],
                                    )); 
?>

<?= $this->Form->end('Modifier'); ?>
