<table>
  <tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Description</th>
    <th>ID_user</th>
    <th>Etat</th>

  </tr>


 <?php foreach($bacs as $key){?>
  <tr>
  	<td><?php echo $key['Bac']['id']; ?></td>
  	<td><?php echo $key['Bac']['title']; ?></td>

  </tr>
<?php }?>
</table>
