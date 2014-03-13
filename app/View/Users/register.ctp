<div class="container-fluid">
<?= $this->Form->create('User'); ?>
        <div class="section">
            <div class="row">
                <h2 class="text-center">Créer votre compte</h2>
                <hr>
                
            
                    <div class="choix">    

                        <div class="row">
                            <div class="form-group">
                                <label for="email" class="col-lg-4 col-md-4 col-sm-4 control-label" style='text-align:right;'>Votre email<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                <?= $this->Form->input('email', array(
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre email'

                                    )); ?>                                
                                </div>
                            </div>
                            <p><br></p>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="password" class="col-lg-4 col-md-4 col-sm-4 control-label" style='text-align:right;'>Mot de passe<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                            <?= $this->Form->input('password', array(
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre mot de passe'

                                    )); ?>                                
                                </div>
                            </div>
                            <p><br></p>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                <label for="password2" class="col-lg-4 col-md-4 col-sm-4 control-label" style='text-align:right;'>Confirmer le mot de passe<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <?= $this->Form->input('password2', array(
                                    'type'  => 'password',
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'placeholder' => 'Vérifiez votre mot de passe'

                                    )); ?>
                                    <p><span class="blue">*</span> Champs obligatoires</p>
                                </div>
                            </div>
                            <p><br></p>

                        </div>




                        <div class="row">   
                                <label class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                                    
                                    <p><br></p>

                                    <button type"submit" class="btn btn-sm btn-primary" style="background-color:#65b7f2;color:white">Créer mon compte</button>
                                    
                                    <?= $this->Form->end(); ?>                                    

                                </label>
                                
                        </div>

                    </div>
            </div>

        </div> <!-- section -->
        
    
            
</div>



