
<?= $this->Html->link('Retour à mes bacs',array('controller' => 'users', 'action' => 'my_bacs'));?>


<?= $this->Form->create('Bacs'); ?>


      <?php
      
      if(isset($bac['Bac']['thumb'])) { 

            echo $this->Html->image($bac['Bac']['thumb'], array('width' => '250', 'height' => '250') ); 


      }
      ?>



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

<p style='text-align:center;'>
      <br />
      <button type"submit"="" class="btn btn-sm btn-primary" style="background-color:#65b7f2;color:white">Modifier</button><?= $this->Form->end(); ?>
</p>

      <h1>Contenu du bac</h1>
            <?php 
            foreach($bac['Media'] as $pic){

                  echo $this->Html->image($pic['file'], array('width' => '250', 'height' => '250') ); 
            }

            ?>

      <h1>Ajouter des photos</h1>


            <?= $this->Media->iframe('Bac', $bac['Bac']['id']); ?>



<p style='text-align:center;'>
      <br />
<?= $this->Html->link('Retour à mes bacs',array('controller' => 'users', 'action' => 'my_bacs'), array('class'=>"btn btn-sm btn-primary" , 'style'=>"background-color:#65b7f2;color:white"));?>
</p>