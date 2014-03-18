<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('lab');




?>
<html>
	
	<head>
		<link rel="stylesheet" href="style.css">
		<script type='text/javascript' src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type='text/javascript' src="main.js"></script>	
	

	</head>


	<body>
		

		<div class="search">
			<input type="text" name="search" id="search" />
		</div>
		<div id="result">
			
		</div>
	</body>
</html>