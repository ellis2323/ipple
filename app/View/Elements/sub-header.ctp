<div id="sub-header" class="container-fluid">
	<div class="row">

		<?php if(!empty($this->request->params['pass'][0]) && ($this->request->params['pass'][0] == 'landing' || $this->request->params['pass'][0] == 'home')) { ?> 

            <!-- Sub-Header -->
            <div class="content">
        
                <?php if(!$this->Session->read('Auth.User.id')) { ?>
                
                    <h2 class="gras">A L'ETROIT CHEZ VOUS ?</h2>
                    <h4 class="gras">Imaginez un placard dans les nuages</h4><br>
                    
                    <h4 style="color:#424242">
                        Parce que le self-stockage traditionnel est trop contraignant,
                        nous nous occupons de tout pour vous : récupération de vos affaires, stockage et livraison à la demande.
                    </h4>

                 <?php } else { ?>
                    
                    <a href="<?=$this->Html->url(array('controller'=>'users', 'action'=>'my_bacs'));?>"><div class="btn btn-lg color-btn margin25">Mes affaires en stock</div></a><br/>
                    <a href="<?=$this->Html->url(array('controller'=>'orders', 'action'=>'step1'));?>"><div class="btn btn-lg color-btn">Prévoir une livraison de bacs vides</div></a>

                <?php } ?>

            </div>
            
        <?php } ?>
        
    </div>
</div>