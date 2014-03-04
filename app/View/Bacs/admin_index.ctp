<?php

debug($this->Session->read());
?>
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
  foreach($bacs as $key):
  // Debut foreach

    ?>
    <tr>
      <td><?php echo $key['Bac']['id']; ?></td>
      <td><?php echo $key['Bac']['user_id']; ?></td>
      <td><?php echo $key['Bac']['title']; ?></td>
      <td><?php echo $key['Bac']['description']; ?></td>

    	<td>
<?= $this->Html->link("Editer",
                  array(
                        'controller' => 'bacs', 
                        'action' => 'admin_edit', $key['Bac']['id']), true); ?>
      </td>

      <td>
<?= $this->Html->link("Supprimer",
                  array(
                        'controller' => 'bacs', 
                        'action' => 'admin_delete', $key['Bac']['id']), true); ?>
      </td>
    </tr>
  <?php 
  endforeach;
  // Fin foreach

  ?>

</table>