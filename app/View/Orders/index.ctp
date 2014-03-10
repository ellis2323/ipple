
<?php echo $this->Form->create('Order'); ?>
  <fieldset>
    <legend><?php echo __('Admin Edit Order'); ?></legend>
  <?php

    echo $this->Form->input('nb_bacs');
    echo $this->Form->input('date_deposit', array('type'=>'date'));


  ?>
  </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>


<?php
// Si l'utilisateur à des bacs
if(!empty($orders)){
// If

?>

<table>
  <tr>
    <th>ID</th>
    <th>Nombre de bacs</th>
    <th>ID_User</th>
    <th>Etat</th>
    <th>Editer</th>
    <th>Supprimer</th>

  </tr>

 <?php 
  foreach($orders as $key):
  // Debut foreach

    ?>
    <tr>
      <td><?php echo $key['Order']['id']; ?></td>
      <td><?php echo $key['Order']['nb_bacs']; ?></td>
      <td><?php echo $key['Order']['user_id']; ?></td>
      <td><?php echo $key['Order']['state']; ?></td>

      <td>
        <?= $this->Html->link("Editer",
                  array(
                        'controller' => 'orders', 
                        'action' => 'edit', $key['Order']['id']), true); 
        ?>
      </td>

      <td>
        <?= $this->Html->link("Supprimer",
                  array(
                        'controller' => 'orders', 
                        'action' => 'cancel', $key['Order']['id']), true); 
        ?>
      </td>
    </tr>
  <?php 
  endforeach;
  // Fin foreach

  ?>

</table>

<?php
// Fin du if
}


// Sinon on le notifie qu'il n'a aucun bac
else {
?>
  <h1>Vous n'avez aucune commande</h1>

<?php
}
?>
