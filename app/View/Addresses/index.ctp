<?php
// Si l'utilisateur à des bacs
if(!empty($addresses)){
// If

?>

<table>
  <tr>
    <th>ID</th>
    <th>Id user</th>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Ville</th>
    <th>Code postal</th>
    <th>Rue</th>
    <th>Numéro de rue</th>
    <th>Digicode</th>
    <th>Etage</th>
    <th>Tel</th>
    <th>Commentaire</th>

  </tr>

 <?php 
  foreach($addresses as $key):
  // Debut foreach

    ?>
    <tr>
      <td><?php echo $key['Address']['id']; ?></td>
      <td><?php echo $key['Address']['user_id']; ?></td>
      <td><?php echo $key['Address']['firstname']; ?></td>
      <td><?php echo $key['Address']['lastname']; ?></td>
      <td><?php echo $key['Address']['city']; ?></td>
      <td><?php echo $key['Address']['postal']; ?></td>
      <td><?php echo $key['Address']['street']; ?></td>
      <td><?php echo $key['Address']['number']; ?></td>
      <td><?php echo $key['Address']['digicode']; ?></td>
      <td><?php echo $key['Address']['etage']; ?></td>
      <td><?php echo $key['Address']['tel']; ?></td>
      <td><?php echo $key['Address']['comment']; ?></td>
      <td>
        <?= $this->Html->link("Editer",
                  array(
                        'controller' => 'addresses', 
                        'action' => 'edit', $key['Address']['id']), true); 
        ?>
      </td>

      <td>
        <?= $this->Html->link("Supprimer",
                  array(
                        'controller' => 'addresses', 
                        'action' => 'cancel', $key['Address']['id']), true); 
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


// Sinon on le notifie qu'il n'a aucune adresse
else {
?>
  <h1>Aucune adresse enregistrée</h1>

<?php
}
?>
