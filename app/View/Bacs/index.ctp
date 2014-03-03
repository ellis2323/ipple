<?php
// Si l'utilisateur à des bacs
if(!empty($bacs)){
// If

?>

<table>
  <tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Description</th>
    <th>ID_user</th>
    <th>Etat</th>

  </tr>

 <?php 
  foreach($bacs as $key):
  // Debut foreach

    ?>
    <tr>
    	<td><?php echo $key['Bac']['id']; ?></td>
      <td><?php echo $key['Bac']['title']; ?></td>
      <td><?php echo $key['Bac']['description']; ?></td>
      <td><?php echo $key['Bac']['user_id']; ?></td>
      <td><?php echo $key['Bac']['state']; ?></td>

    	<td>
<?= $this->Html->link("Editer",
                  array(
                        'controller' => 'bacs', 
                        'action' => 'edit', $key['Bac']['id']), true); ?>
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

<h1>Vous n'avez aucun bac</h1>

<?php
}
?>
