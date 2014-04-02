<h1>Ajout simple</h1>
<?= $this->Form->create('Bacs'); ?>

<?= $this->Form->input('code', array(
						'type' => 'text',
                                    'label' => "Identifiant du bac", 
                                    'class' => 'form-control',
                                    )); 
?>



<?= $this->Form->end('Ajouter'); ?>


<h1>Ajout liste</h1>

<?= $this->Form->create('Bacs'); ?>

<?= $this->Form->input('basename', array(
                                    'type' => 'text',
                                    'label' => "Base du nom", 
                                    'class' => 'form-control',
                                    )); 
?>
<?= $this->Form->input('start', array(
                                    'type' => 'text',
                                    'label' => "Id de début", 
                                    'class' => 'form-control',
                                    )); 
?>
<?= $this->Form->input('end', array(
                                    'type' => 'text',
                                    'label' => "Id de fin", 
                                    'class' => 'form-control',
                                    )); 
?>


<?= $this->Form->end('Ajouter'); ?>
