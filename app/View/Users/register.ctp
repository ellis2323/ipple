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
                                    <?= $this->Form->input('lastname', array(
                                    'label' => "", 
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre nom'
                                    )); ?>
                                </div>                                
                            </div>
                        </div>
                        <p><br></p>
                        <div class="row">    
                            <div class="form-group">
                                <label for="prenom" class="col-lg-4 col-md-4 col-sm-4 control-label">Prénom<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                <?= $this->Form->input('firstname', array(
                                    'label' => "", 
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre prénom'

                                    )); ?>                                
                                </div>
                            </div>
                            <p><br></p>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="email" class="col-lg-4 col-md-4 col-sm-4 control-label">Votre email<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                <?= $this->Form->input('email', array(
                                    'label' => "", 
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre email'

                                    )); ?>                                
                                </div>
                            </div>
                            <p><br></p>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="password" class="col-lg-4 col-md-4 col-sm-4 control-label">Mot de passe<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                            <?= $this->Form->input('password', array(
                                    'label' => "", 
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre email'

                                    )); ?>                                
                                </div>
                            </div>
                            <p><br></p>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                <label for="password2" class="col-lg-4 col-md-4 col-sm-4 control-label">Vérifiez le mot de passe<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <?= $this->Form->input('password2', array(
                                    'label' => '', 
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre mot de passe'

                                    )); ?>
                                    <p><span class="blue">*</span> Champs obligatoires</p>
                                </div>
                            </div>
                            <p><br></p>
                        </div>




                        <div class="row">   
                            <div class="checkbox">
                                <label class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                                    <input required="" type="checkbox">Se souvenir de moi

                                    <p><br></p><?= $this->Form->end("Je créer mon compte"); ?>                                    
                                    <button type"submit"="" class="btn" style="background-color:#65b7f2;color:white">Je crée mon compte</button>
                                </label>
                            </div>
                        </div>

                    </div>
            </div>

        </div> <!-- section -->
        
    
            
</div>



