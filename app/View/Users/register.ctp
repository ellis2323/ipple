
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
									<?= $this->Form->input('nom', array('label' => "")); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="nom" class="col-lg-4 col-md-4 col-sm-4 control-label">Prenom<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('prenom', array('label' => "")); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>
                        <div class="row">    
                            <div class="form-group">
                                <label for="prenom" class="col-lg-4 col-md-4 col-sm-4 control-label">Email<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('email', array('label' => "")); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="password" class="col-lg-4 col-md-4 col-sm-4 control-label">Mot de passe<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('password', array('label' => "")); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="password" class="col-lg-4 col-md-4 col-sm-4 control-label">Vérifiez le mot de passe<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('password2', array('type' => "password", 'label' => "")); ?>
                                    <p><span class="blue">*</span> Champs obligatoires</p>
                                </div>
                            </div>
                            <p><br></p>
                        </div>
                        <div class="row">   
                            <div class="checkbox">
                       		<label class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
								<?= $this->Form->end("S'inscrire"); ?>                                    
                       		</label>
                       		</div>
                       	</div>

                    </div>
        </div> <!-- section -->
        
    </form>
            
        </div> <!-- section -->

