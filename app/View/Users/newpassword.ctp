
<div class="container-fluid">

<?=$this->Form->create('User')?>

        <div class="section">

            <div class="row bandeau">
                <h2 class="text-center verti">Changement de mot de passe</h2>
                
            </div>

            <div class="row">
                
                
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 ">
                        <div class="choix">

                            <div class="row">
                                <div class="form-group">
                                    <label for="UserPassword" class="col-lg-4 col-md-4 col-sm-4 control-label" style='text-align:right;'>Mot de passe<span class="blue">*</span></label>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                <?= $this->Form->input('password', array(
                                        'label' => false, 
                                        'class' => 'form-control',
                                        'placeholder' => 'Nouveau mot de passe'

                                        )); ?>                                
                                    </div>
                                </div>
                                <p><br></p>
                            </div>


                            <div class="row">
                                <div class="form-group">
                                    <label for="UserPassword2" class="col-lg-4 col-md-4 col-sm-4 control-label" style='text-align:right;'>Confirmer le mot de passe<span class="blue">*</span></label>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
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
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">

                                        <p><br></p>

                                        <button type="submit" class="btn" style="background-color:#65b7f2;color:white;">Je change de mot de passe</button>
                                    </div>

                                    
                            </div>

                        </div>
                </div>
        </div>

    </div> <!-- section -->
        
    
<?= $this->Form->end(); ?>            
</div>


