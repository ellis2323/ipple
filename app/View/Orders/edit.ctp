<?= $this->start('radio_control');?>
<script type='text/javascript'>
$( document ).ready(function() {

    var withdraw = "<?= $state_withdrawal;?>";


    if(withdraw == 0 ){
        $('#return').hide(); // on cache le bloc 
    }
  
    // Checkbox concierge
    $('#OrderConciergeDeposit').change(function(){
         if($(this).is(':checked')) {
                $('#return').fadeIn();
                $("#OrderDateWithdrawal").prop('required',true);
                $("#OrderWithdraw1").prop('checked',false);
                $("#OrderWithdraw2").prop('checked',true);

            }

    });

    // Bouton en même temps
    $('#OrderWithdraw1').change(function(){
     if($(this).is(':checked')) {
            $('#return').fadeOut();
            $("#OrderDateWithdrawal").prop('required',false);
            $('#OrderConciergeDeposit').attr('checked',false);
        }
    }); 

    // Bouton différé
    $('#OrderWithdraw2').change(function(){
     if($(this).is(':checked')) {
            $('#return').fadeIn();
            $("#OrderDateWithdrawal").prop('required',true);
        }
    });





});
        
</script>


<?= $this->end();?>


<div class="container-fluid">
 <?php
// Si la commande n'est pas finie
if($order['Order']['state'] < 3){?>


<?= $this->Form->create('Order', array(
'class' => 'horizontal-form',
));  ?>

<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">     
	<div class="section">

        <div class="row">
        <?php if($order['Order']['state_deposit'] == 0){?>
               <h3><?php echo $this->Html->image('fleche_liv.png', array('alt' => 'responsive image'));?> Où voulez-vous vous faire livrer les bacs?</h3>
        <?php }
        else {?>
               <h3><?php echo $this->Html->image('fleche_liv.png', array('alt' => 'responsive image'));?> Où voulez-vous vous que nous récupérions les bacs?</h3>
        <?php }?>
        </div>

		<div class="choix">    

               

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
                                    echo $this->Form->label('Address.lastname', 'Nom', array(
                                                                                    'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                                    'style' => 'text-align:right;',

                                                                                )
                                    );
                                    ?>
                                    <?php
                                    echo $this->Form->input('Address.lastname', array(
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
                                    echo $this->Form->label('Address.firstname', 'Prénom', array(
                                                                                    'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                                    'style' => 'text-align:right;',
                                                                                )
                                    );
                                    ?>
                                    <?php
                                    echo $this->Form->input('Address.firstname', array(
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
                                    echo $this->Form->label('Address.company', 'Entreprise', array(
                                                                                    'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                                    'style' => 'text-align:right;',
                                                                                )
                                    );
                                    ?>
                                    <?php
                                    echo $this->Form->input('Address.company', array(
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
                                    echo $this->Form->label('Address.phone', 'Téléphone', array(
                                                                                    'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                                    'style' => 'text-align:right;',
                                                                                )
                                    );
                                    ?>
                                    <?php
                                    echo $this->Form->input('Address.phone', array(
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
                                    echo $this->Form->label('Address.street', 'Adresse <span class="blue">*</span>', array(
                                                                                    'class' => 'col-lg-2 col-md-2 col-sm-2 control-label',
                                                                                    'style' => 'text-align:right;',
                                                                                )
                                    );
                                    ?>
                                    <?php
                                    echo $this->Form->input('Address.street', array(
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
                                    echo $this->Form->label('Address.floor', 'Etage', array(
                                                                                    'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                                    'style' => 'text-align:right;',
                                                                                )
                                    );
                                    ?>
                                    <?php
                                    echo $this->Form->input('Address.floor', array(
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
                                    echo $this->Form->label('Address.digicode', 'Digicode', array(
                                                                                    'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                                    'style' => 'text-align:right;',
                                                                                )
                                    );
                                    ?>
                                    <?php
                                    echo $this->Form->input('Address.digicode', array(
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
                                    echo $this->Form->label('Address.comment', 'Commentaire', array(
                                                                                    'class' => 'col-lg-2 col-md-2 col-sm-2 control-label',
                                                                                    'style' => 'text-align:right;',
                                                                                )
                                    );
                                    ?>

                                    <?php
                                    echo $this->Form->input('Address.comment', array(
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

              <div class="row">
                <!-- HEURE ET DATE -->
                    <h3><?php echo $this->Html->image('fleche_recup.png', array('alt' => 'responsive image'));?> Quand voulez-vous faire livrer les bacs chez vous?</h3>  


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">                            
                            <?php
                            echo $this->Form->label('date_deposit', 'Date de livraison<span class="blue">*</span>', array(
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
                                    'class' => 'form-control',
                                    'div' => 'col-lg-6 col-md-6 col-sm-6',
                                    'required' => true,
                                    'id'        => 'OrderDateDeposit',
                                    'value'     => $order['Order']['date_deposit']

                                )
                            ); ?>
                            <div id="datepicker"></div>

                                <?= $this->start('datepicker'); ?>

                                <script type='text/javascript'>
                                 $(document).ready(function(){
                                            var datesBlocked = ["2014-03-14","2014-03-15","2014-03-16"];

                                              $("#OrderDateDeposit").click(function(){
                                                     $("#datepicker").datepicker(
                                                    {
                                                           dateFormat: 'dd-mm-yy',
                                                           minDate : 0,
                                                           monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                                                           beforeShowDay: function(date){
                                                                var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                                                return [ datesBlocked.indexOf(string) == -1 ];
                                                            },
                                                           onSelect: function(dateText, inst){
                                                                 $('#OrderDateDeposit').val(dateText);
                                                                 $("#datepicker").datepicker("destroy");
                                                          }
                                                     });
                                               });
                                        });
                                 </script>


                                 
                                 <?= $this->end(); ?> 

                                 <!-- /DATEPICKER --> 



                            <div class="checkbox">
                                <?php
                                echo $this->Form->label('concierge_deposit', 'Concierge? Oui, laisser les bacs chez mon concierge', array(
                                                                                                                                    'class' => 'col-lg-6 col-md-6 col-sm-6',
                                                                                                                                )
                                );
                                ?>
                                <?php
                                    echo $this->Form->input('Order.concierge_deposit', array(
                                                        'label' => false,
                                                        'type'  => 'checkbox',

                                    ));
                                ?>
                            </div>

                            


                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">  
                            <?php
                            echo $this->Form->label('HoursDeposit', 'Heure de la livraison', array(
                                                                            'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                            'style' => 'text-align:right;',
                                                                        )
                            );
                            ?>
                            <?php
                            echo $this->Form->input('hours', array(
                                                                            'label' => false, 
                                                                            'class' => 'form-control',
                                                                            'id'    => 'OrderHoursDeposit',

                                                                            'div' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            'default'     => $order['Order']['hour_deposit']
                                                                     )
                            );?>
                        </div>
                        <p><br></p>
                    </div>


            </div> <!-- /row -->



		</div> <!-- /choix -->



        <div class="row">
            <h3><?php echo $this->Html->image('fleche_recup.png', array('alt' => 'responsive image'));?> Quand voulez-vous que les bacs soient récupérés chez vous ?</h3>  

            <div class="radio col-lg-offset-4 col-md-offset-4 col-sm-offset-4">

            <?php 
            if(empty($state_withdrawal)){

                    echo $this->Form->input('withdraw', array(
                     'type' => 'radio',
                     'legend' => false,
                     'options' => array(1 => 'En même temps (le chauffeur attendra jusqu\'à 20 minutes) '),
                     'hiddenField'=>false,
                     'checked' => 'checked',
                    ));  

                    echo $this->Form->input('withdraw', array(
                     'type' => 'radio',
                     'legend' => false,
                     'options' => array(2 => 'Je prévois ma date et mon horaire de stockage'),
                     'hiddenField'=>false
                    ));  
            }
            else {
                    echo $this->Form->input('withdraw', array(
                     'type' => 'radio',
                     'legend' => false,
                     'options' => array(1 => 'En même temps (le chauffeur attendra jusqu\'à 20 minutes) '),
                     'hiddenField'=>false,
                    ));  

                    echo $this->Form->input('withdraw', array(
                     'type' => 'radio',
                     'legend' => false,
                     'options' => array(2 => 'Je prévois ma date et mon horaire de stockage'),
                     'hiddenField'=>false,
                     'checked' => 'checked',

                    ));  

            }
            ?>

            </div>  

        </div> <!-- /row -->

<?php } 
// fin if livraison



// Si la récupération est disponible
 if($order['Order']['state_deposit'] == 1){?>
 <div class='row'>
        <p><br /></p>
       <h3><?php echo $this->Html->image('fleche_liv.png', array('alt' => 'responsive image'));?> Quand voulez-vous que les bacs soient récupérés chez vous ?</h3>
</div>
<?php } ?>

                <div class="row" id="return">
                <!-- HEURE ET DATE -->


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">                            
                            <?php
                            echo $this->Form->label('date_withdrawal', 'Date de récupération<span class="blue">*</span>', array(
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
                                    'class' => 'form-control',
                                    'div' => 'col-lg-6 col-md-6 col-sm-6',
                                    'required' => true,
                                    'id'        => 'OrderDateWithdrawal',
                                    'value'     => $order['Order']['date_withdrawal']

                                )
                            ); ?>
                            <div id="datepicker2"></div>

                                <?= $this->start('datepicker2'); ?>
                                <script type='text/javascript'>
                                 $(document).ready(function(){
                                            var datesBlocked = ["2014-03-14","2014-03-15","2014-03-16"];

                                              $("#OrderDateWithdrawal").click(function(){
                                                     $("#datepicker2").datepicker(
                                                    {
                                                           dateFormat: 'dd-mm-yy',
                                                           minDate : $('#OrderDateDeposit').val(),
                                                           monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                                                           beforeShowDay: function(date){
                                                                var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                                                return [ datesBlocked.indexOf(string) == -1 ];
                                                            },
                                                           onSelect: function(dateText, inst){
                                                                 $('#OrderDateWithdrawal').val(dateText);
                                                                 $("#datepicker2").datepicker("destroy");
                                                          }
                                                     });
                                               });
                                        });
                                 </script>


                                 
                                 <?= $this->end(); ?> 

                                 <!-- /DATEPICKER --> 




                            <div class="checkbox">
                                <?php
                                echo $this->Form->label('concierge_withdrawal', 'Concierge? Oui, récupérez les bacs chez mon concierge', array(
                                                                                                                                    'class' => 'col-lg-6 col-md-6 col-sm-6',
                                                                                                                                )
                                );
                                ?>
                                <?php
                                    echo $this->Form->input('Order.concierge_withdrawal', array(
                                                        'label' => false,
                                                        'type'  => 'checkbox',

                                    ));
                                ?>
                            </div>
                            


                        </div> <!-- /formgroup -->
                    </div> <!-- col lg 2 -->

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">  
                                <?php
                                echo $this->Form->label('HoursWithdrawal', 'Heure de la livraison', array(
                                                                                'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                                                                                'style' => 'text-align:right;',
                                                                            )
                                );
                                ?>
                                <?php
                                echo $this->Form->input('hours', array(
                                                                                'label' => false, 
                                                                                'class' => 'form-control',
                                                                                'id'    => 'OrderHoursWithdrawal',
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
//} // fin if récupération
?>
                    <div class='col-lg-12 col-md-12 col-sm-12 ' style='text-align:center;'>
                        <p><br></p>
                        <button type="submit" class="btn col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 " style="background-color:#65b7f2;color:white;">Modifier</button>
                        

                        <p><br></p>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p> <span class="blue">*</span> Champs obligatoires</p>
                        </div>                                   
                    </div>

               


<?php
}
// fin IF order disponible
?>

		</div>

	</div>
 <?= $this->Form->end(); ?>  
   
</div>





