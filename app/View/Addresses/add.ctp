<?= $this->Form->create('Orders'); ?>

      <?= $this->Form->input('nb_bacs', array(
      						'type' => 'text',
                                          'label' => "Nombre de bac", 
                                          'class' => 'form-control',
      )); ?>

<?= $this->Form->end('Commander'); ?>
