<?= $this->Form->create('Bacs'); ?>

<?= $this->Form->input('id', array(
						'type' => 'text',
                                    'label' => "Id du bac", 
                                    'class' => 'form-control',
                                    )); 
?>



<?= $this->Form->end('Ajouter'); ?>


<?= $this->Html->link('Ajouter', array('controller' => 'bacs', 'action' => 'add', 'admin' => true));?> 