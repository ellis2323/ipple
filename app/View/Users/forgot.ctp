<div class="container-fluid">
<?php echo $this->Form->create('User');?>
	<div class="section">
		<div class="col-lg-10 col-md-10 col-sm-10">
			<h3 class="text-center">Voulez-vous changer votre mot de passe?</h3><br>

	        <div class="form-group">
	        
	            <div class="form-group">
	                <label for="UserEmail" class="col-lg-4 col-md-4 col-sm-4 control-label" style='text-align:right'>Votre email<span class="blue">*</span></label>
	                <div class="col-lg-6 col-md-6 col-sm-6">
	                <?= $this->Form->input('email', array(
	                    'label' => false, 
	                    'class' => 'form-control',
	                    'placeholder' => 'Votre email'

	                    )); ?>                                
	                </div>
	            </div>
	            <p><br></p>
	            
	        </div>

	        <div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4">
	        		<p><br></p>
	                <p><button type="submit" class="btn  btn-md btn-primary btn-block" style="background-color:#65b7f2;color:white">J'ai besoin d'un nouveau mot de passe</button></p>
	                
	        </div>
	        
        </div>
	</div>
<?= $this->Form->end();?>	
</div>
