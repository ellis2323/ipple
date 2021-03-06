<?= $this->Html->css('latoja.datepicker', array('inline' => false)); ?>
	    
<script type='text/javascript'>
$( document ).ready(function() {

	var concierge = "<?= $withdraw;?>";

	if(concierge==0){
		// Si on ne dépose pas chez le concierge
		if(concierge == 0 ){
	    	$('#return').hide(); // on cache le bloc 
		}
	}
	else {
	    $("#OrderSelectDate").prop('required',true);
	};

    $('#OrderWithdraw1').change(function(){
	 if($(this).is(':checked')) {
	        $('#return').show();
	        $("#OrderSelectDate").prop('required',true);
	    }
	});



    $('#OrderWithdraw0').change(function(){
	 if($(this).is(':checked')) {
	        $('#return').hide();
	        $("#OrderSelectDate").prop('required',false);
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
		            <h3><?php echo $this->Html->image('fleche_recup.png', array('alt' => 'responsive image'));?> Quand voulez-vous que les bacs soient récupérés chez vous ?</h3>  

		            <div class="radio col-lg-offset-4 col-md-offset-4 col-sm-offset-4">

		            <?php 
		            if($withdraw != 1){
                            // withdraw == 0
		                    echo $this->Form->input('withdraw', array(
							 'type' => 'radio',
							 'legend' => false,
							 'options' => array(0 => 'En même temps (le chauffeur attendra jusqu\'à 20 minutes) '),
							 'hiddenField'=>false,
							 'checked' => 'checked',
							));  

		                    echo $this->Form->input('withdraw', array(
							 'type' => 'radio',
							 'legend' => false,
							 'options' => array(1 => 'Je prévois ma date et mon horaire de stockage'),
							 'hiddenField'=>false
							));  
		            }
		            else {
		                    echo $this->Form->input('withdraw', array(
							 'type' => 'radio',
							 'legend' => false,
							 'options' => array(0 => 'En même temps (le chauffeur attendra jusqu\'à 20 minutes) '),
							 'hiddenField'=>false,
							));  

		                    echo $this->Form->input('withdraw', array(
							 'type' => 'radio',
							 'legend' => false,
							 'options' => array(1 => 'Je prévois ma date et mon horaire de stockage'),
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
		                <label for="OrderSelectDate" class="col-lg-2 col-md-2 col-sm-2 control-label">Date de récupération<span class="blue">*</span></label>

		                <div class="col-lg-4 col-md-4 col-sm-4">
                            <!-- DATEPICKER -->
                            <?= $this->Form->input("date_withdrawal", 
                                array(
                                    'label' => false, 
                                    'type' => 'text',
                                    'id' => 'OrderSelectDate',
                                    'class' => 'form-control',
                                    'div' => 'col-lg-6 col-md-6 col-sm-6',
                                    'required' => false,
                                    'default' => $date_withdrawal,
                                )
                            ); ?>
                            
                            <div id="datepicker"></div>

                                <?= $this->start('datepicker'); ?>

                                <script type='text/javascript'>
                                 $(document).ready(function(){
                                            var datesBlocked = ["2014-03-14","2014-03-15","2014-03-16"];

                                              $("#OrderSelectDate").click(function(){
                                                     $("#datepicker").datepicker(
                                                    {
                                                           dateFormat: 'dd-mm-yy',
                                                           minDate : '<?= $minDate;?>',
                                                           maxDate : '<?= $maxDate;?>',
                                                           beforeShowDay: function(date){
                                                                var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                                                return [ datesBlocked.indexOf(string) == -1 ];
                                                            },
                                                           onSelect: function(dateText, inst){
                                                                 $('#OrderSelectDate').val(dateText);
                                                                 $("#datepicker").datepicker("destroy");
                                                          }
                                                     });
                                               });
                                        });
                                 </script>

                                 
                                 <?= $this->end(); ?> 

                        
		                     <?= $this->Form->input("date_deposit", 
                                array(
                                    'label' => false, 
                                    'type' => 'hidden',
                                    'class' => 'form-control',
                                    'div' => 'col-lg-6 col-md-6 col-sm-6',
                                    'required' => false,
                                    'value'	=> $date_deposit,

                                )
                            ); ?>
		            	</div>
		            </div>

                    <div class="checkbox">
                        <?php
                        echo $this->Form->label('concierge_withdrawal', 'Concierge? Oui, récupérer les bacs chez mon concierge', array(
                                                                        'class' => 'col-lg-6 col-md-6 col-sm-6',
                                                                    )
                        );
                        ?>
                        <?php
                            echo $this->Form->input('concierge_withdrawal', array(
                                                'label' => false,
                                                'type'  => 'checkbox',
                            ));
                        ?>
                    </div>

		            <div class="col-lg-6 col-md-6 col-sm-6">
		                <div class="form-group">
		                    <label for="Order.hwithdrawals" class="col-lg-4 col-md-4 col-sm-4 control-label">Heure de récupération<span class="blue">*</span></label>
		                    <div class="col-lg-6 col-md-6 col-sm-6">
								<?php

								echo $this->Form->input('Order.hwithdrawals', array(
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