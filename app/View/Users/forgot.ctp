<div class="container-fluid">
	<div class="section">
		<div class="col-lg-10 col-md-10 col-sm-10">
			<h3 class="text-center">Voulez-vous changer votre mot de passe?</h3><br>

	        <div class="form-group">
	        <?php echo $this->Form->create('User');?>
	            <div class="form-group">
	                <label for="email" class="col-lg-4 col-md-4 col-sm-4 control-label" style='text-align:right'>Votre email<span class="blue">*</span></label>
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
	                <p><button type"submit"="" class="btn  btn-md btn-primary btn-block" style="background-color:#65b7f2;color:white">Envoyez-moi un nouveau mot de passe</button></p>
	                <?= $this->Form->end();?>
	        </div>

        </div>
	</div>
</div>
