<div id="footer" class="container-fluid">

    <!-- Contact -->
    <div id="contact" class="row">
        <div class="content col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
    		<div class="row">
        
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h3>Contact</h3>
                    <p><span class="glyphicon glyphicon-envelope"></span><a href="#"> support@dezordre.com</a></p>
                    <p><span class="glyphicon glyphicon-phone"></span> (+33) 09.09.09.09.09</p>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h3>A propos</h3>
                   	<p><a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'display', 'faq') );?>">FAQ</a></p>
                    <p><a href="/pdf/cgv_dezordre.pdf" target="_blank">CGV</a></p>
                    <p><a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'display', 'legals') );?>">Mentions légales</a></p>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h3>Suivez-nous!</h3>
    				<div>
                        <a href="https://www.facebook.com/pages/Dezordre/265749423573092?fref=ts" target='_blank'><?php echo $this->Html->image('facebook.png', array('alt' => 'responsive image', 'class' => 'img-responsive"')); ?></a>
                        <a href="https://twitter.com/Dezordre" target='_blank'><?php echo $this->Html->image('twitter.png', array('alt' => 'responsive image', 'class' => 'img-responsive"')); ?></a>
                	</div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h3>Nous</h3>
                    <p>Dézordre est une marque de <a href="http://www.happymove.fr"><strong>HAPPYMOVE </strong></a> fondée en 2011.</p>
                </div>
                
        	</div>
        </div>
    </div>

    <!-- Footer-address -->
    <div id="footer-address" class="row">
        <div class="content col-xs-12">
    		<p class="text-center">dézordre, 10 rue de l'Amiral Courbet 94 160 Saint-Mandé - Ouvert 6j/7 de 8h30à 19h</p>
        </div>
    </div>
    
</div>