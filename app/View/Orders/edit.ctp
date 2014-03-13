<div class="container-fluid">
	<div class="section">

		<div class="choix">    


				<?= $this->Form->create('Order', array(
					'class' => 'horizontal-form',
					));  ?>
                	<div class="row">
						
	                    <div class="col-lg-6 col-md-6 col-sm-6">

	                        <div class="form-group">
	                            <?php
	                            echo $this->Form->label('nb_bacs', 'Nombre de bacs', array(
	                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
	                                                                            'style' => 'text-align:right;',
	                                                                        )
	                            );
	                            ?>
	                            <?php
	                            echo $this->Form->input('Order.nb_bacs', array(
	                                                                            'type' => 'number',
	                                                                            'label' => false, 
	                                                                            'class' => 'form-control',
	                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
	                                                                            'value'     => $order['Order']['nb_bacs']
	                                                                            
	                                                                     )
	                            );?>

	                        </div>
	                         <p><br></p>
	                	</div>                    
					
					</div>

					<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="form-group">
                            <?php
                            echo $this->Form->label('lastname', 'Nom', array(
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
                                                                            'value'     => $order['Address']['lastname']
                                                                            
                                                                     )
                            );?>

                        </div>
                         <p><br></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="form-group">                            
                        <?php
                            echo $this->Form->label('firstname', 'Prénom', array(
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
                                                                            'value'     => $order['Address']['firstname']
                                                                            
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
                                                                            'value'     => $order['Address']['company']
                                                                            
                                                                     )
                            );?>
                        </div>
                         <p><br></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">

                            <?php
                            echo $this->Form->label('phone', 'Téléphone', array(
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
                                                                            'value'     => $order['Address']['phone']
                                                                            
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
                                                                            'value'     => $order['Address']['street']
                                                                            
                                                                     )
                            );?>
                        </div>
                         <p><br></p>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('cities', 'Ville', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('cities', array(
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            'default'     => $order['Address']['city_id']
                                                                            
                                                                     )
                            );?>
                        </div>
                         <p><br></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('postals', 'Code postal', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('postals', array(
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            'default'     => $order['Address']['postal_id']
                                                                            
                                                                     )
                            );?>
                        </div>
                         <p><br></p>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('floor', 'Etage', array(
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
                                                                            'value'     => $order['Address']['floor']
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
                                                                            'value'     => $order['Address']['digicode']
                                                                     )
                            );?>
                        </div>
                        <p><br></p>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12" >
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
                                                                            'value'     => $order['Address']['comment']
                                                                     )
                            );?>
                        </div>
                    </div>

					
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('hours', 'Heure de la livraison', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('hours', array(
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            'default'     => $order['Order']['hour_deposit']
                                                                     )
                            );?>
                        </div>
                        <p><br></p>
                    </div>

        			<div class='col-lg-12 col-md-12 col-sm-12 ' style='text-align:center;'>
        				<p><br></p>
                        <button type"submit" class="btn col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 " style="background-color:#65b7f2;color:white;">Modifier</button>
                        <?= $this->Form->end(); ?>  

                        <p><br></p>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p> <span class="blue">*</span> Champs obligatoires</p>
                        </div>                                   
                    </div>
				</div>
		</div>

	</div>
</div>




