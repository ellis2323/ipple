<?= $this->Html->css('latoja.datepicker', array('inline' => false)); ?>

	    
<script type='text/javascript'>
$( document ).ready(function() {
    console.log( "ready!" );
    $('#return').hide();

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
		                    echo $this->Form->input('withdraw', array(
							 'type' => 'radio',
							 'legend' => false,
							 'options' => array(1 => 'En même temps (le chauffeur attendra jusqu\'à 20 minutes) '),
							 'hiddenField'=>false,
							 'checked' => 'checked',
							));  
	                    ?>
	                    <?php 
		                    echo $this->Form->input('withdraw', array(
							 'type' => 'radio',
							 'legend' => false,
							 'options' => array(2 => 'Je prévois ma date et mon horaire de stockage'),
							 'hiddenField'=>false
							));  
	                    ?>		       

	                </div>  

                </div>

	                    

	        </div><!-- choix -->
						
	</div> 




        <div id="return" class="section">        
             
                
            <div class="choix">
            	<div class="row">
                    <div class="form-group">
                        <label for="date" class="col-lg-2 col-md-2 col-sm-2 control-label">Date de livraison (récupération)<span class="blue">*</span></label>

                        <div class="col-lg-4 col-md-4 col-sm-4 ll-skin-latoja">
                            <!-- DATEPICKER -->
                            <?= $this->Form->input("date_withdrawal", 
                                array(
                                    'label' => false, 
                                    'type' => 'text',
                                    'id' => 'select_date2',
                                    'class' => 'form-control',
                                    'div' => 'col-lg-6 col-md-6 col-sm-6',
                                    'required' => false,

                                )
                            ); ?>
                            <div id="datepicker2"></div>



                            <?= $this->start('datepicker'); ?>

                            <script type='text/javascript'>
                             $(document).ready(function(){
                                        var datesBlocked = ["2014-03-14","2014-03-15","2014-03-16"];

                                        var day = "<?= $split_date[1] ?>";
                            			var month = "<?= $split_date[0] ?>";
                            			var year = "<?= $split_date[2] ?>";

                                          $("#select_date2").click(function(){
                                                 $("#datepicker2").datepicker(
                                                {
                                                       dateFormat: 'mm/dd/yy',
                                                       minDate : new Date(year, month, day),
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

								<div class="checkbox">
                                            <label class="col-lg-8 col-md-8 col-sm-8">
                                                <input type="checkbox" /> Concierge? Oui, récupérez les chez mon concierge
                                            </label>
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
 		</div>
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

                        <button type"submit"="" class="btn" style="background-color:#65b7f2;color:white;">Commander</button>
                        <?= $this->Form->end(); ?> 

                        <p><br></p>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
							<p> <span class="blue">*</span> Champs obligatoires</p>
						</div>                               
                    </div>

            </div>
        </div> <!-- section -->
	</div>
</div>