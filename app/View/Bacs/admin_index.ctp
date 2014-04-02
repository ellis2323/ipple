<?= $this->Html->link('Ajouter', array('controller' => 'bacs', 'action' => 'add', 'admin' => true));?> 

<table>
  <tr>
    <th>Identifiant du bac</th>
    <th>ID user</th>
    <th>Editer</th>
    <th>Supprimer</th>

  </tr>

 <?php 
 if(!empty($bacs)):
  foreach($bacs as $key):
  // Debut foreach

    ?>
    <tr>
      <td><?php echo $key['Bac']['code']; ?></td>

    	<td>
<?= $this->Html->link("Editer",
                  array(
                        'controller' => 'bacs', 
                        'action' => 'admin_edit', $key['Bac']['id']), true); ?>
      </td>

      <td>

<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $key['Bac']['id']), null, __('Etes vous sur de vouloir supprimer %s ? (irreversible) ', $key['Bac']['code'])); ?>
      </td>
      </td>
    </tr>
  <?php 
  endforeach;
  endif;
  // Fin foreach

  ?>

</table>


<?= $this->Html->link('Ajouter', array('controller' => 'bacs', 'action' => 'add', 'admin' => true));?> 