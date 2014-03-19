<?= $this->Html->css('latoja.datepicker', array('inline' => false)); ?>
	    
<script type='text/javascript'>
$( document ).ready(function() {

	var concierge = "<?= $concierge_deposit;?>";


	if(concierge!=1){
    	$('#return').hide();
	}
    $('#OrderWithdraw2').change(function(){
	 if($(this).is(':checked')) {
	        $('#return').fadeIn();
	    }
	});
    $('#OrderWithdraw1').change(function(){
	 if($(this).is(':checked')) {
	        $('#return').fadeOut();
	    }
	});	

});
		
</script>


<div class="container-fluid">
	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">

		<?= $this->Form->create('Order', array(
					 										'class' => 'horizontal-form'
					 										));  ?>
		<div class="section">
		    <div class="choix">



		        <div class="row">
		            <h3><?php echo $this->Html->image('fleche_recup.png', array('alt' => 'responsive image'));?> Quand voulez-vous que les bacs soient récupérés ?</h3>  

		            <div class="radio col-lg-offset-4 col-md-offset-4 col-sm-offset-4">

		            <?php 
		            if($concierge_deposit != 1){

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

		                

		    </div><!-- choix -->
						
		</div> <!-- /section -->




		<div id="return" class="section">        
		     
		        
		    <div class="choix">
		    	<div class="row">
		            <div class="form-group">
		                <label for="date_withdrawal" class="col-lg-2 col-md-2 col-sm-2 control-label">Date de récupération<span class="blue">*</span></label>

		                <div class="col-lg-4 col-md-4 col-sm-4">
                            <!-- DATEPICKER -->
                            <?= $this->Form->input("date_withdrawal", 
                                array(
                                    'label' => false, 
                                    'type' => 'text',
                                    'id' => 'select_date',
                                    'class' => 'form-control',
                                    'div' => 'col-lg-6 col-md-6 col-sm-6',
                                    'required' => false,

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




                            <div class="checkbox">
                            	<?php
                                echo $this->Form->label('concierge_withdrawal', 'Concierge? Oui, récupérer les bacs chez mon concierge', array(
                                                                                'class' => 'col-lg-6 col-md-6 col-sm-6',
                                                                            )
                                );
                                ?>                                
                                <?php
                                    echo $this->Form->input('concierge_withdrawal', array(
                                                        'class' => 'form-control',
                                                        'label' => false,
                                                        'type'  => 'checkbox',
                                    ));
                                ?>
                            </div>
                        
		                     
		            	</div>
		            </div>

		            <div class="col-lg-6 col-md-6 col-sm-6">
		                <div class="form-group">
		                    <label for="hwithdrawals" class="col-lg-4 col-md-4 col-sm-4 control-label">Heure de récupération<span class="blue">*</span></label>
		                    <div class="col-lg-6 col-md-6 col-sm-6">
								<?php

								echo $this->Form->input('hwithdrawals', array(

		                                            'class' => 'form-control',
		                                            'label' => false
		                      	));?>                                  
		              		</div>
		                </div>
					</div>   

		   		</div> <!-- /row -->
		  	</div> <!-- /choix-->

		</div> <!-- section -->

        <div class="section">

            	<!--
                <div class="form-group">
                    <label for="code_promo" class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 control-label">Avez-vous un code promo?</label>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <input type="text" class="form-control" id="code_promo" placeholder="code promo">
                    </div>
                </div>
                -->
                
            
            <div class="checkbox">
                    <div class='col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4' style='text-align:center;'>
                    	<?php
                    			if($this->Session->read('Auth.User.rules') == 0){
									echo $this->Form->input('cgv', array(
		                                                'class' => 'form-control',
		                                                'label' => "J'ai lu et j'accepte les <a href=''>Conditions Générales de ventes</a>",
		                                                'type'	=> 'checkbox',
		                                                'required' => true,
		                          	));
	                          	}
	                          	?> 
                       

        				<p><br></p>

                        <button type="submit" class="btn" style="background-color:#65b7f2;color:white;">Commander</button>

                        <p><br></p>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
							<p> <span class="blue">*</span> Champs obligatoires</p>
						</div>                               
                    </div>

            </div> <!-- /checkbox -->


        </div> <!-- section -->

    <?= $this->Form->end(); ?> 

	</div> <!-- col-lg-8 centré -->
</div> <!-- container fluid -->