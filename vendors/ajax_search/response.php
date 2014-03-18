<?php
	mysql_connect('localhost', 'root', '');
	mysql_select_db('lab');

	if(isset($_GET)){
			$data = $_GET['data'];

			$sql = "SELECT * FROM postals WHERE label like '%$data%' LIMIT 0,5";
			$sql = mysql_query($sql);

			while($retour = mysql_fetch_array($sql)){

				echo $retour['label']."<br />";
			}
	}
?>