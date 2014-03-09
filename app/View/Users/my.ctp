<?php

foreach($bacs as $bac){

	echo "Id du bac : ".$bac['id']."<br />";
	echo "Id de la commande : ".$bac['order_id']."<br />";
	echo "Titre du bac : ".$bac['title']."<br />";
	echo "Description du bac : ".$bac['description']."<br />";

	echo "<br />";
}

?>