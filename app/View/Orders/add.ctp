

<div class="container-fluid">
<?php

 echo $this->Form->create('Order', array(
 										'class' => 'horizontal-form'
 										));  ?>
         <div class="section">
            
                <h2 class="text-center">Commander des bacs</h2>
                <hr>
                <h3><?php echo $this->Html->image('marqueur.png', array('alt' => 'responsive image'));?></h3>   
                <h3>Choisissez votre ville</h3>
                 
                    <div class="choix">   
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4">
                                <div class="input-group">
                                      <?php echo $this->Form->input('cities', array(
                                      													'label' => false,
                                      													'class' => 'btn btn-default dropdown-toggle'
                                      													)); ?>
  
                                    </div><!-- /btn-group -->
                                </div><!-- /input-group -->
                                <br><p>Votre ville n'est pas présente? <a href="#"> Demandez-la</a></p>
                            </div><!-- /.col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
            
        </div> <!-- section -->
    
        <div class="section">
            
            
                <h3><?php echo $this->Html->image('minibac.png', array('alt' => 'responsive image'));?></h3>   
                <h3>Combien de bacs désirez-vous?</h3>
                 
                    <div class="choix">   
                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm- col-sm-offset-1">
                                <h4>Stockage mensuel 6,25€</h4>
                            
                                
                                    <div class="form-group">
                                        
                                          <label for="inputnbrbac" class="col-lg-6 col-md-6 col-sm-6 control-label" style="font-size:18px">Nombre de bacs</label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
												<?php

												echo $this->Form->input('nb_bacs', array(
                                                                    'type' => 'number',
                                                                    'class' => 'form-control',
                                                                    'label' => false
                                              	));?>
                                         </div>  
                                    </div><!-- /input-group -->
                                <!-- </form> -->
                                <h4>Votre mensualité :</h4>
                                <p>Vous ne savez pas de combien de bacs vous avez besoin?<br>
                                Commandez en plus, vous ne paierez que ceux que vous utilisez</p>
                            </div><!-- /.col-lg-4 -->
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-">
                                <div class="container-fluid">
									<?php echo $this->Html->image('bac_dim.png', array('alt' => 'responsive image'));?>
								</div>
                            </div>
                        </div> <!-- /.row -->
                    </div> <!-- choix -->
            
        </div> <!-- section -->
    
        <div class="section">
            
                <div class="row">
                    
                        <h3><?php echo $this->Html->image('fleche_liv.png', array('alt' => 'responsive image'));?></h3>   
                        <h3>Où voulez-vous vous faire livrer les bacs?</h3>
                </div>
            <div class="choix">    
                
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="nom" class="col-lg-4 col-md-4 col-sm-4 control-label">Nom<span class="blue">*</span></label>
                            <div class="col-lg-6 col-md-6 col-sm-6">
							<?php

							echo $this->Form->input('Address.0.lastname', array(
                                                'type' => 'text',
                                                'label' => false, 
                                                'class' => 'form-control',
                          	));?>                              
                          </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="prenom" class="col-lg-4 col-md-4 col-sm-4 control-label">Prénom<span class="blue">*</span></label>
                            <div class="col-lg-6 col-md-6 col-sm-6">
							<?php

							echo $this->Form->input('Address.0.firstname', array(
                                                'type' => 'text',
                                                'label' => false, 
                                                'class' => 'form-control',
                          	));?>                            
                           </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="entreprise" class="col-lg-4 col-md-4 col-sm-4 control-label">Entreprise</label>
                            <div class="col-lg-6 col-md-6 col-sm-6">
							<?php

							echo $this->Form->input('Address.0.company', array(
                                                'type' => 'text',
                                                'class' => 'form-control',
                                                'label' => false
                          	));?>                            
                          </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="telephone" class="col-lg-4 col-md-4 col-sm-4 control-label">Téléphone<span class="blue">*</span></label>
                            <div class="col-lg-6 col-md-6 col-sm-6">
							<?php

							echo $this->Form->input('Address.0.phone', array(
                                                'type' => 'text',
                                                'class' => 'form-control',
                                                'label' => false
                          	));?>                             </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="adresse" class="col-lg-2 col-md-2 col-sm-2 control-label">Adresse<span class="blue">*</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-6" style="margin:0 10px">
							<?php

							echo $this->Form->input('Address.0.street', array(
                                                'type' => 'text',
                                                'class' => 'form-control',
                                                'label' => false
                          	));?>                         </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="code_postal" class="col-lg-4 col-md-4 col-sm-4 control-label">Code Postal<span class="blue">*</span></label>
                            <div class="col-lg-6 col-md-6 col-sm-6">
							<?php

							echo $this->Form->input('postals', array(
                                                'class' => 'form-control',
                                                'label' => false
                          	));?>                             </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="etage" class="col-lg-4 col-md-4 col-sm-4 control-label">Etage</label>
                            <div class="col-lg-6 col-md-6 col-sm-6">
							<?php

							echo $this->Form->input('Address.0.floor', array(
                                                'type' => 'number',
                                                'class' => 'form-control',
                                                'label' => false
                          	));?>                             </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="digicode" class="col-lg-4 col-md-4 col-sm-4 control-label">Digicode</label>
                            <div class="col-lg-6 col-md-6 col-sm-6">
							<?php

							echo $this->Form->input('Address.0.digicode', array(
                                                'type' => 'text',
                                                'class' => 'form-control',
                                                'label' => false
                          	));?>                             </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="commentaires" class="col-lg-2 col-md-2 col-sm-2 control-label">Commentaires pour<br> la livraison</label>
                        <div class="col-lg-6 col-md-6 col-sm-6" style="margin:0 10px">
							<?php

							echo $this->Form->input('Address.0.comment', array(
                                                'type' => 'textarea',
                                                'class' => 'form-control',
                                                'label' => false
                          	));?>                             <p><span class="blue">*</span> Champs obligatoires</p>
                        </div>
                    </div>
                
                
            </div>

        </div> <!--section --> 
    
        <div class="section">
            <div class="choix">
                <div class="row">
                    
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="date" class="col-lg-4 col-md-4 col-sm-4 control-label">Date de livraison<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
							<?php

							echo $this->Form->input('date_deposit', array(
                                                'type' => 'date',
                                                'class' => 'form-control',
                                                'label' => false
                          	));?>                                     
                          	<div class="checkbox">
                                        <label class="col-lg-8 col-md-8 col-sm-8">
                                            <input type="checkbox"> Concierge? Oui, laissez les bacs à mon concierge
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="heure_liv" class="col-lg-4 col-md-4 col-sm-4 control-label">Heure de livraison<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?php

									echo $this->Form->input('hours', array(
		                                                'class' => 'form-control',
		                                                'label' => false
		                          	));?>                                  
                          		</div>
                            </div>

                        </div>

                    

                </div>

            </div> <!-- choix -->
            <p> <span class="blue">*</span> Champs obligatoires</p>
        </div> <!-- section -->
    
        <div class="section">        
            <h3><?php echo $this->Html->image('fleche_recup.png', array('alt' => 'responsive image'));?></h3>   
            <h3>Quand voulez-vous récupérez les bacs?</h3>   
                
            <div class="choix">
                <div class="radio col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                     <?php 

                    $options = array('1' => 'Immédiat', '2' => 'Différé');
                    $attributes = array('legend' => false);
                    echo $this->Form->radio('withdraw', $options, $attributes);

                     ?>
       


                </div>  
            </div>  

            <div class="row">
                    
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="date" class="col-lg-4 col-md-4 col-sm-4 control-label">Date de livraison (récupération)<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
							<?php

							echo $this->Form->input('date_withdrawal', array(
                                                'type' => 'date',
                                                'class' => 'form-control',
                                                'label' => false
                          	));?>                                     
                          	<div class="checkbox">
                                        <label class="col-lg-8 col-md-8 col-sm-8">
                                            <input type="checkbox"> Concierge? Oui, laissez les bacs à mon concierge
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="heure_liv" class="col-lg-4 col-md-4 col-sm-4 control-label">Heure de livraison<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
									<?php

									echo $this->Form->input('hours', array(
		                                                'class' => 'form-control',
		                                                'label' => false
		                          	));?>                                  
                          		</div>
                            </div>

                        </div>

                    

                </div>   
        </div> <!-- section -->
    
        <div class="section">

            
                <div class="form-group">
                    <label for="code_promo" class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 control-label">Avez-vous un code promo?</label>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <input type="text" class="form-control" id="code_promo" placeholder="code promo">
                    </div>
                </div>
                
            
            <div class="checkbox">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                        <input type="checkbox" required=""> j'ai lu et j'accepte les <a href="">CGV</a>
                        <p><br>
						<?php echo $this->Form->end('Commander', array(
																		'class' => 'btn  btn-lg btn-primary',
																		)); ?>

						</p>
                    </label>
            </div>
        </div> <!-- section -->
    </form>
    </div>