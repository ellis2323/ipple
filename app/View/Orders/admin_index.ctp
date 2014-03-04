<table>
  <tr>
    <th>ID Bac</th>
    <th>ID user</th>
    <th>Titre</th>
    <th>Description</th>
    <th>Editer</th>
    <th>Supprimer</th>

  </tr>

 <?php 
  foreach($orders as $key):
  // Debut foreach

    ?>
    <tr>
      <td><?php echo $key['Order']['id']; ?></td>
      <td><?php echo $key['Order']['user_id']; ?></td>
      <td><?php echo $key['Order']['nb_bacs']; ?></td>
      <td><?php echo $key['Order']['created']; ?></td>
      <td><?php echo $key['Order']['modified']; ?></td>


    	<td>
<?= $this->Html->link("Editer",
                  array(
                        'controller' => 'orders', 
                        'action' => 'admin_edit', $key['Order']['id']), true); ?>
      </td>

      <td>
<?= $this->Html->link("Supprimer",
                  array(
                        'controller' => 'orders', 
                        'action' => 'admin_delete', $key['Order']['id']), true); ?>
      </td>
    </tr>
  <?php 
  endforeach;
  // Fin foreach

  ?>

</table>