
<div class="container-fluid">
	<?= $this->Form->create('User'); ?>
        <div class="section">
            <div class="row">
                <h2 class="text-center">Créer votre compte</h2>
                <hr>
                
            
                    <div class="choix">    
                        <div class="row">
                            <div class="form-group">
                                <label for="nom" class="col-lg-4 col-md-4 col-sm-4 control-label">Nom<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('nom', array('label' => "Nom")); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="nom" class="col-lg-4 col-md-4 col-sm-4 control-label">Prenom<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('prenom', array('label' => "Prénom")); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>
                        <div class="row">    
                            <div class="form-group">
                                <label for="prenom" class="col-lg-4 col-md-4 col-sm-4 control-label">Email<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('email', array('label' => "Email")); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="password" class="col-lg-4 col-md-4 col-sm-4 control-label">Mot de passe<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('password', array('label' => "Mot de passe")); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="password" class="col-lg-4 col-md-4 col-sm-4 control-label">Vérifiez le mot de passe<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('password2', array('type' => "password", 'label' => "Confirmer le mot de passe")); ?>
                                    <p><span class="blue">*</span> Champs obligatoires</p>
                                </div>
                            </div>
                            <p><br></p>
                        </div>
                        
						<?= $this->Form->end("S'inscrire"); ?>

                    </div>
        </div> <!-- section -->
        
    </form>
            
        </div> <!-- section -->

