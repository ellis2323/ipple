<table>
  <tr>
    <th>ID</th>
    <th>email</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Role</th>
    <th>Editer</th>
    <th>Supprimer</th>

  </tr>

 <?php 
  foreach($users as $key):
  // Debut foreach

    ?>
    <tr>
    	<td><?php echo $key['User']['id']; ?></td>
      <td><?php echo $key['User']['email']; ?></td>
      <td><?php echo $key['User']['firstname']; ?></td>
      <td><?php echo $key['User']['lastname']; ?></td>
      <td><?php echo $key['User']['role']; ?></td>

    	<td>
<?= $this->Html->link("Editer",
                  array(
                        'controller' => 'users', 
                        'action' => 'admin_edit', $key['User']['id']), true); ?>
      </td>

      <td>
<?= $this->Html->link("Supprimer",
                  array(
                        'controller' => 'users', 
                        'action' => 'admin_delete', $key['User']['id']), true); ?>
      </td>
    </tr>
  <?php 
  endforeach;
  // Fin foreach

  ?>

</table>