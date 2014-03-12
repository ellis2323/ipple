<?= $this->Html->css('jquery-ui-1.10.4.custom.min', array('inline' => false)); ?>
<?= $this->Html->css('latoja.datepicker', array('inline' => false)); ?>

<?= $this->Html->script('jquery-1.10.2'); ?>
<?= $this->Html->script('jquery-ui-1.10.4.custom.min'); ?>

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
            
            
                <h3><?php echo $this->Html->image('minibac.png', array('alt' => 'responsive image'));?></h3>   
                <h3>Combien de bacs désirez-vous?</h3>
                 
                    <div class="choix">   
                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm- col-sm-offset-1">
                                <h4>Stockage mensuel 6,25€</h4>
                                <div class="form-group">
									<?php
                                    echo $this->Form->label('nb_bacs', 'Nombre de bacs', array(
                                                                                    'class' => 'col-lg-6 col-md-6 col-sm-6 control-label'
                                                                                )
                                    );
                                    ?>
                                    <div class='col-lg-4 col-md-4 col-sm-4'>
                                    <?php
    									echo $this->Form->input('nb_bacs', array(
                                                            'label' => false,                                                         
                                                            'type' => 'number',
                                                            'class' => 'form-control',
                                      	                 )
                                        );?>
                                    </div>
                                </div>
                                <br />
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
                            <?php
                            echo $this->Form->label('lastname', 'Nom <span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label'
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
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label'
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
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label'
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
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label'
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
                                                                            'class' => 'col-lg-2 col-md-2 col-sm-2 control-label'
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.street', array(
                                                                            'type' => 'text',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'style' => "margin-left:-6px;",
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                     )
                            );?>
                        </div>
                         <p><br></p>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('postals', 'Code postal <span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label'
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('postals', array(
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
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label'
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
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label'
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
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('comment', 'Commentaire', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label'
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('Address.0.comment', array(
                                                                            'type' => 'textarea',
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                     )
                            );?>
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
                                <div class="col-lg-6 col-md-6 col-sm-6 ll-skin-latoja">
                                    <!-- DATEPICKER -->


                                    <?= $this->Form->input("date_deposit", 
                                        array(
                                        'label' => false, 
                                        'id' => 'select_date',
                                        'class' => 'form-control',
                                        'type' => 'text',
                                        'div' => 'col-lg-6 col-md-6 col-sm-6',
                                        )
                                    ); ?>
                                    <div id="datepicker"></div>
                                    <?= $this->start('datepicker'); ?>

                                    <script type='text/javascript'>
                                     $(document).ready(function(){
                                                var datesBlocked = ["2014-03-14","2014-03-15","2014-03-16"];

                                                  $("#select_date").click(function(){
                                                         $("#datepicker").datepicker(
                                                        {
                                                                dateFormat: 'dd/mm/yy',
                                                                monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                                                               beforeShowDay: function(date){
                                                                    var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                                                    return [ datesBlocked.indexOf(string) == -1 ];
                                                                },
                                                               onSelect: function(dateText, inst){
                                                                     $('#select_date').val(dateText);
                                                                     $("#datepicker").datepicker("destroy");
                                                              }
                                                         }
                                                         );
                                                   });
                                            });
                                     </script>
                                     <?= $this->end(); ?> 

                                     <!-- /DATEPICKER --> 

                                  	<div class="checkbox">
                                                <label class="col-lg-8 col-md-8 col-sm-8">
                                                    <input type="checkbox" /> Concierge? Oui, laissez les bacs à mon concierge
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

                    $options = array(
                        '1' => 'En même temps (le chauffeur attendra jusqu\'à 20 minutes) '
                    );
                    $attributes = array('legend' => false);
                    echo $this->Form->radio('withdraw', $options, $attributes);

                     ?>
       


                </div>
                <div class="radio col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                     <?php 

                    $options = array(
                        '2' => 'Je prévois ma date et mon horaire de récupération '
                    );
                    $attributes = array('legend' => false);
                    echo $this->Form->radio('withdraw', $options, $attributes);

                     ?>
       


                </div>    
            </div>  

            <div class="row">
                    
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="date" class="col-lg-4 col-md-4 col-sm-4 control-label">Date de livraison (récupération)<span class="blue">*</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6 ll-skin-latoja">
                                    <!-- DATEPICKER -->
                                    <?= $this->Form->input("date_withdrawal", 
                                        array(
                                            'label' => false, 
                                            'type' => 'text',
                                            'id' => 'select_date2',
                                            'class' => 'form-control',
                                            'div' => 'col-lg-6 col-md-6 col-sm-6',

                                        )
                                    ); ?>
                                    <div id="datepicker2"></div>

                                    <?= $this->start('datepicker2'); ?>

                                    <script type='text/javascript'>
                                     $(document).ready(function(){
                                                var datesBlocked = ["2014-03-14","2014-03-15","2014-03-16"];

                                                  $("#select_date2").click(function(){
                                                         $("#datepicker2").datepicker(
                                                        {
                                                               dateFormat: 'dd/mm/yy',
                                                               monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                                                               beforeShowDay: function(date){
                                                                    var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                                                    return [ datesBlocked.indexOf(string) == -1 ];
                                                                },
                                                               onSelect: function(dateText, inst){
                                                                     $('#select_date2').val(dateText);
                                                                     $("#datepicker2").datepicker("destroy");
                                                              }
                                                         }
                                                         );
                                                   });
                                            });
                                     </script>
                                     <?= $this->end(); ?> 

                                     <!-- /DATEPICKER --> 

                                      	<div class="checkbox">
                                                    <label class="col-lg-8 col-md-8 col-sm-8">
                                                        <input type="checkbox" /> Concierge? Oui, laissez les bacs à mon concierge
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
                        <input type="checkbox" required=""> J'ai lu et j'accepte les <a href="">Conditions Générales de ventes</a>
                        <p><br>
						<?php echo $this->Form->end('Commander'); ?>

						</p>
                    </label>
            </div>
        </div> <!-- section -->
    </form>
    </div>