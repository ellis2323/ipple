<div class="container-fluid">
<?= $this->Form->create('Order', array(
 										'class' => 'horizontal-form',
 									));  ?>
         <div class="section">
            
                <h2 class="text-center">Commander des bacs</h2>
                <hr>
                <h3><?php echo $this->Html->image('marqueur.png', array('alt' => 'responsive image'));?> Choisissez votre ville</h3>
                 
                    <div class="choix">   
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4">
                                      <?php echo $this->Form->input('cities', array(
                                      													'label' => false,
                                      													'class' => 'btn btn-default dropdown-toggle'
                                      													)); ?>
  
                                <br><p>Votre ville n'est pas présente? <a href="#"> Demandez-la</a></p>
                            </div><!-- /.col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
            
        </div> <!-- section -->
    
        <div class="section">
            
            
                <h3><?php echo $this->Html->image('minibac.png', array('alt' => 'responsive image'));?> Combien de bacs désirez-vous?</h3>
                 
                    <div class="choix">   
                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm- col-sm-offset-1">
                                <div class="row">
                                    <h4>Stockage mensuel 6,25€</h4>
                                    <div class="form-group">
    									<?php
                                        echo $this->Form->label('nb_bacs', 'Nombre de bacs', array(
                                                                                        'class' => 'col-lg-6 col-md-6 col-sm-6 control-label',
                                                                                        
                                                                                    )
                                        );
                                        ?>
                                        <div class='col-lg-4 col-md-4 col-sm-4'>
                                        <?php
        									echo $this->Form->input('nb_bacs', array(
                                                                'label' => false,                                                         
                                                                'type' => 'number',
                                                                'class' => 'form-control',
                                                                'placeholder' => 4,
                                                                'default' => 4,
                                          	                 )
                                            );?>
                                        </div>
                                    </div>
                                </div>
                                <br />

                                <div class="row">
                                    <div class="form-group">
                                        <h4>Votre mensualité :</h4>
                                        <p>Vous ne savez pas de combien de bacs vous avez besoin?<br>
                                    Commandez en plus, vous ne paierez que ceux que vous utilisez</p>
                                    </div>
                                </div>
                            </div><!-- /.col-lg-4 -->

                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-">
									<?php echo $this->Html->image('bac_dim.png', array('alt' => 'responsive image'));?>
                            </div>

                            
                            <div class='col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4' style='text-align:center;'>
                                <button type"submit"="" class="btn" style="background-color:#65b7f2;color:white;">Prochaine étape (2/3)</button>
                                <?= $this->Form->end(); ?>  

                                <p><br></p>
                        
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <p> <span class="blue">*</span> Champs obligatoires</p>
                                </div>                                   
                            </div>

                        </div> <!-- /.row -->
                    </div> <!-- choix -->



        </div> <!-- section -->                    
</div>        