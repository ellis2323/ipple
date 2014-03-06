

<?php
 echo $this->Form->create('Order');  ?>

<?php

echo $this->Form->input('nb_bacs', array('value'     => $order['Order']['nb_bacs']));

/*
// Si l'utilisateur à déjà des adresses renseignées
if(!empty($addresses)){
		echo $this->Form->input('addresses');
		echo $this->Form->input('cities');
		echo $this->Form->input('postals');

		echo $this->Form->input('Address.0.firstname');
		echo $this->Form->input('Address.0.lastname');
		echo $this->Form->input('Address.0.street');
		echo $this->Form->input('Address.0.digicode');
		echo $this->Form->input('Address.0.floor');
		echo $this->Form->input('Address.0.comment');


}

// Sinon
else {
	*/

		echo $this->Form->input('cities', array('value'     => $order['City']['label']));

		echo $this->Form->input('postals', array('value'     => $order['Postal']['label']));

		echo $this->Form->input('Address.0.firstname', array('value'     => $order['Address']['firstname']));

		echo $this->Form->input('Address.0.lastname', array('value'     => $order['Address']['lastname']));

		echo $this->Form->input('Address.0.street', array('value'     => $order['Address']['street'] ));

		echo $this->Form->input('Address.0.digicode', array('value'     => $order['Address']['digicode'] ));

		echo $this->Form->input('Address.0.floor', array('value'     => $order['Address']['floor']));

		echo $this->Form->input('Address.0.comment', array('value'     => $order['Address']['comment']));



//}
		echo $this->Form->input('date', array('type' => 'date'));
		echo $this->Form->input('hours', array('value'     => $order['Hour']['start_hour']));


	?>
<br />




<?php echo $this->Form->end('Modifier'); ?>
