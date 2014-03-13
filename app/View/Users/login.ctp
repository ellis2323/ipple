
<div class="container-fluid">
        <div class="section">
            <div class="row">
                <h2 class="text-center">Créer votre compte</h2>
                <hr>
                
            
                    <div class="choix">  
                        <?= $this->Form->create('User'); ?>
  
                        <div class="row">
                            <div class="form-group">  
                                <?php
                                echo $this->Form->label('email', 'Email <span class="blue">*</span>', array(
                                                                                'class' => 'col-lg-1 col-lg-offset-4 col-md-1 col-sm-1 control-label'
                                                                            )
                                );
                                ?>
                                <?php
                                echo $this->Form->input('email', array(
                                                                                'type' => 'text',
                                                                                'label' => false, 
                                                                                'class' => 'form-control',
                                                                                'div' => 'col-lg-2 col-md-2 col-sm-2',
                                                                         )
                                );?>
                            </div>
                            <p><br></p>
                        </div>

                        <div class="row">
                            <div class="form-group">  
                                <?php
                                echo $this->Form->label('password', 'Password <span class="blue">*</span>', array(
                                                                                'class' => 'col-lg-1 col-lg-offset-4 col-md-1 col-sm-1 control-label'
                                                                            )
                                );
                                ?>
                                <?php
                                echo $this->Form->input('password', array(
                                                                                'type' => 'password',
                                                                                'label' => false, 
                                                                                'class' => 'form-control',
                                                                                'div' => 'col-lg-2 col-md-2 col-sm-2',
                                                                         )
                                );?>
                            </div>
                            <p><br></p>
                        </div>

                        <div class="row" style='text-align:center;'>   
                            <div class='col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4'>
                                <button type"submit"="" class="btn" style="background-color:#65b7f2;color:white">Se connecter</button>
    							<?= $this->Form->end(); ?>                                    
                       		</div>
                            <div class='col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4'>
                            <?= $this->Html->link('Mot de passe oublié ?', array('action' => 'forgot' )); ?>
                            </div>
                       	</div>

                    </div>
        </div> <!-- section -->
        
            
        </div>  

</div>

                                    
