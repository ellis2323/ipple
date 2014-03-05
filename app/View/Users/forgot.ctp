
		<h1>Regénérer un mot de passe</h1>
		<p>
		<?php echo $this->Form->create('User');?>

		<?php echo $this->Form->input('email');?>

		<?php echo $this->Form->end('Envoyer une confirmation par mail');?>
		</p>
