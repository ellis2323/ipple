<div class="container-fluid">
<div class="section">

			<?= $this->Form->create('Order', array(
			 										'class' => 'horizontal-form',
			 										));  ?>

            <div class="row">
                
                    <h3><?php echo $this->Html->image('fleche_liv.png', array('alt' => 'responsive image'));?> Où voulez-vous vous faire livrer les bacs?</h3>
            </div>

            <div class="choix">    
                	<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="form-group">
                            <?php
                            echo $this->Form->label('lastname', 'Nom <span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.lastname', array(
                                                                            'type' => 'text',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            
                                                                     )
                            );?>

                        </div>
                         <p><br></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="form-group">                            
                        <?php
                            echo $this->Form->label('firstname', 'Prénom <span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.firstname', array(
                                                                            'type' => 'text',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            
                                                                     )
                            );?>
                        </div>
                         <p><br></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  

                            <?php
                            echo $this->Form->label('company', 'Entreprise', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.company', array(
                                                                            'type' => 'text',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            
                                                                     )
                            );?>
                        </div>
                         <p><br></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">

                            <?php
                            echo $this->Form->label('phone', 'Téléphone <span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.phone', array(
                                                                            'type' => 'text',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            
                                                                     )
                            );?>
                        </div>
                         <p><br></p>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                    
                        <div class="form-group">

                            <?php
                            echo $this->Form->label('street', 'Adresse <span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-2 col-md-2 col-sm-2 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.street', array(
                                                                            'type' => 'text',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'style' => "margin-left:-5px;",
                                                                            'div' => 'col-lg-9 col-md-9 col-sm-9',
                                                                            
                                                                     )
                            );?>
                        </div>
                         <p><br></p>

                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('postals', 'Code postal <span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.postals', array(
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            
                                                                     )
                            );?>
                        </div>
                         <p><br></p>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('floor', 'Etage <span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.floor', array(
                                                                            'type' => 'number',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                     )
                            );?>
                        </div>
                         <p><br></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('digicode', 'Digicode', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.digicode', array(
                                                                            'type' => 'text',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                     )
                            );?>
                        </div>
                        <p><br></p>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('comment', 'Commentaire', array(
                                                                            'class' => 'col-lg-2 col-md-2 col-sm-2 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>

                            <?php
                            echo $this->Form->input('Address.0.comment', array(
                                                                            'type' => 'textarea',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-9 col-md-9 col-sm-9',
                                                                            'style' => 'margin-left:-5px;',
                                                                     )
                            );?>
                        </div>
                    </div>
        			<div class='col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4' style='text-align:center;'>
        				<p><br></p>
                        <button type"submit"="" class="btn" style="background-color:#65b7f2;color:white;">Prochaine étape (3/3)</button>
                        <?= $this->Form->end(); ?>  

                        <p><br></p>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p> <span class="blue">*</span> Champs obligatoires</p>
                        </div>                                   
                    </div>

                    </div> <!-- /row -->
            </div>

        </div> <!--section --> 




</div>