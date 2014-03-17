<?= $this->Html->css('latoja.datepicker', array('inline' => false) );?>

<div class="container-fluid">
<?= $this->Form->create('Order', array(
                                        'class' => 'horizontal-form',
                                    ));  ?>

    <div class="row bandeau">
        <h2 class="text-center">Commander des bacs</h2>
    </div><br>
    
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">                                        
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
                </div>

                <div class="row">
                <!-- HEURE ET DATE -->
                    <h3><?php echo $this->Html->image('fleche_recup.png', array('alt' => 'responsive image'));?> Quand voulez-vous récupérez les bacs?</h3>  


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="date" class="col-lg-4 col-md-4 col-sm-4 control-label">Date de livraison<span class="blue">*</span></label>
                            <div class="col-lg-4 col-md-4 col-sm-4 ll-skin-latoja">


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
                                                        dateFormat: 'mm/dd/yy',
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
                                    <?= $this->end();?>

                                 <!-- /DATEPICKER --> 


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




        			<div class='col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4' style='text-align:center;' >

                        <div class="checkbox">
                                    <label class="col-lg-8 col-md-8 col-sm-8">
                                        <input type="checkbox" /> Concierge? Oui, laissez les bacs à mon concierge
                                    </label>
                        </div>

        				<p><br></p>
                        <button type"submit" class="btn" style="background-color:#65b7f2;color:white;">Prochaine étape (3/3)</button>
                        <?= $this->Form->end(); ?>  

                        <p><br></p>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p> <span class="blue">*</span> Champs obligatoires</p>
                        </div>                                   
                    </div>





                    <?= $this->end(); ?> 
                </div>

            </div> <!-- /choix -->

        </div>  <!-- /section -->


    </div>  <!-- / container centré -->

</div> <!-- /container-fluid -->
