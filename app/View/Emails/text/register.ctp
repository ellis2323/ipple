<html>

	<head>
		
	</head>

<body>
	

	Merci de vous êtes inscrit sur Dezordre

	email : <?= $email;?>


	lien d'activation : <?= $this->Html->url(array('controller' => 'users', 'action' => 'activate', $id, $token)); ?>

</body>
</html>


