
<div class="container-fluid">
        <div class="section">
            <div class="row">
                <h2 class="text-center">Créer votre compte</h2>
                <hr>
                
            
                    <div class="choix">  
                        <?= $this->Form->create('User'); ?>
  
                        <div class="row">
                            <div class="form-group">
                                <label for="nom" class="col-lg-4 col-md-4 col-sm-4 control-label">Email<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('email', array(
                                    'label' => "", 
                                    'class' => 'form-control'
                                    )); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="nom" class="col-lg-4 col-md-4 col-sm-4 control-label">Password<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?= $this->Form->input('password', array(
                                    'label' => "", 
                                    'class' => 'form-control'
                                    )); ?>
                                </div>
                            </div>
                            <p><br></p>
                        </div>

                        <div class="row">   
                            <div class="checkbox">
                       		<label class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
							<?= $this->Form->end("Se connecter"); ?>                                    
                       		</label>
                       		</div>
                       	</div>

                    </div>
        </div> <!-- section -->
        
            
        </div>  

</div>

                                    
