<div class="row">
	

	<div class="span12">
		
		<h1>S'inscrire</h1>
		<?= $this->Form->create('User'); ?>

			<?= $this->Form->input('email', array('label' => "Email")); ?>
			<?= $this->Form->input('password', array('label' => "Mot de passe")); ?>
			<?= $this->Form->input('password2', array('type' => "password", 'label' => "Confirmer le mot de passe")); ?>

			<?= $this->Form->input('nom', array('label' => "Nom")); ?>
			<?= $this->Form->input('prenom', array('label' => "Prénom")); ?>


		<?= $this->Form->end("S'inscrire"); ?>


	</div>


</div>


