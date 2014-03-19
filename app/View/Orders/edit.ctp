<div class="container-fluid">
<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">     
	<div class="section">

        <div class="row">
                <h3><?php echo $this->Html->image('fleche_liv.png', array('alt' => 'responsive image'));?> Où voulez-vous vous faire livrer les bacs?</h3>
        </div>

		<div class="choix">    

                <?php
                // Si la commande n'est pas finie
                 if($order['Order']['state'] < 3){?>
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
                                                                                'default'     => $order['Address']['comment']
                                                                         )
                                );?>
                            </div>
                        </div>



<?php

// Si la livraison n'est pas encore effectuée
 if($order['Order']['state_deposit'] == 0) { ?>
				<?= $this->Form->create('Order', array(
					'class' => 'horizontal-form',
					));  ?>


              <div class="row">
                <!-- HEURE ET DATE -->
                    <h3><?php echo $this->Html->image('fleche_recup.png', array('alt' => 'responsive image'));?> Quand voulez-vous faire livrer les bacs chez vous?</h3>  


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">                            
                            <?php
                            echo $this->Form->label('select_date', 'Date de livraison<span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>

                            <!-- DATEPICKER -->
                            <?= $this->Form->input("date_deposit", 
                                array(
                                    'label' => false, 
                                    'type' => 'text',
                                    'id' => 'select_date',
                                    'class' => 'form-control',
                                    'div' => 'col-lg-6 col-md-6 col-sm-6',
                                    'required' => true,
                                    'value'     => $order['Order']['date_deposit']

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
                                                           dateFormat: 'mm/dd/yy',
                                                           minDate : 0,
                                                           monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                                                           beforeShowDay: function(date){
                                                                var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                                                return [ datesBlocked.indexOf(string) == -1 ];
                                                            },
                                                           onSelect: function(dateText, inst){
                                                                 $('#select_date').val(dateText);
                                                                 $("#datepicker").datepicker("destroy");
                                                          }
                                                     });
                                               });
                                        });
                                 </script>


                                 
                                 <?= $this->end(); ?> 

                                 <!-- /DATEPICKER --> 




                            <div class="checkbox">
                                    <label class="col-lg-6 col-md-6 col-sm-6" style='margin-left:20px'>
                                <?php
                                    echo $this->Form->input('concierge_deposit', array(
                                                        'class' => 'form-control',
                                                        'label' => false,
                                                        'type'  => 'checkbox',
                                                        'required' => true,
                                                        'default'  => $order['Order']['concierge_deposit']
                                    ));
                                ?> Concierge? Oui, laissez les bacs à mon concierge
                                    </label>
                            </div>
                            


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


                    </div> <!-- /row -->



				</div>
<?php } 
// fin if livraison


// Si la récupération est disponible
if($order['Order']['state_withdrawal'] == 1) {
?>
              <div class="row">
                <!-- HEURE ET DATE -->
                    <h3><?php echo $this->Html->image('fleche_recup.png', array('alt' => 'responsive image'));?> Quand voulez-vous que les bacs soient récupérés chez vous ?</h3>  


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">                            
                            <?php
                            echo $this->Form->label('select_date2', 'Date de récupération<span class="blue">*</span>', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>

                            <!-- DATEPICKER -->
                            <?= $this->Form->input("date_withdrawal", 
                                array(
                                    'label' => false, 
                                    'type' => 'text',
                                    'id' => 'select_date',
                                    'class' => 'form-control',
                                    'div' => 'col-lg-6 col-md-6 col-sm-6',
                                    'required' => true,
                                    'value'     => $order['Order']['date_deposit']

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
                                                           dateFormat: 'mm/dd/yy',
                                                           minDate : 0,
                                                           monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                                                           beforeShowDay: function(date){
                                                                var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                                                return [ datesBlocked.indexOf(string) == -1 ];
                                                            },
                                                           onSelect: function(dateText, inst){
                                                                 $('#select_date2').val(dateText);
                                                                 $("#datepicker2").datepicker("destroy");
                                                          }
                                                     });
                                               });
                                        });
                                 </script>


                                 
                                 <?= $this->end(); ?> 

                                 <!-- /DATEPICKER --> 




                            <div class="checkbox">
                                    <label class="col-lg-6 col-md-6 col-sm-6" style='margin-left:20px'>
                                <?php
                                    echo $this->Form->input('concierge_withdrawal', array(
                                                        'class' => 'form-control',
                                                        'label' => false,
                                                        'type'  => 'checkbox',
                                                        'required' => true,
                                                        'default'  => $order['Order']['concierge_withdrawal']
                                    ));
                                ?> Concierge? Oui, laissez les bacs à mon concierge
                                    </label>
                            </div>
                            


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


                    </div> <!-- /row -->



                </div>



<?php
} // fin if récupération
?>
                    <div class='col-lg-12 col-md-12 col-sm-12 ' style='text-align:center;'>
                        <p><br></p>
                        <button type"submit" class="btn col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 " style="background-color:#65b7f2;color:white;">Modifier</button>
                        

                        <p><br></p>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p> <span class="blue">*</span> Champs obligatoires</p>
                        </div>                                   
                    </div>

                <?= $this->Form->end(); ?>  


<?php
}
// fin IF order disponible
?>

		</div>

	</div>
    </div>
</div>




