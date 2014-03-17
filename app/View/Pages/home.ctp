
    <div class="container-fluid row" id="comment">
        <div class="section" >
            <div class="row bandeau">
                <h2  class="text-center">Comment ça marche?</h2>
            </div><br>


            
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
            <div class="row">
                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-4 largeur">
                        
                        <?php echo $this->Html->image('un.png', array('alt' => 'responsive image', 'class' => 'img-responsive', 'style' => 'margin: 0 auto;')); ?>                        
                    </div>
                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-4 largeur">
                        
                        <?php echo $this->Html->image('deux.png', array('alt' => 'responsive image', 'class' => 'img-responsive', 'style' => 'margin: 0 auto;')); ?>                        
                    </div>
                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-4 largeur">
                        
                        <?php echo $this->Html->image('trois.png', array('alt' => 'responsive image', 'class' => 'img-responsive', 'style' => 'margin: 0 auto;')); ?>                        
                    </div>
            </div><!-- /.row -->
            </div>
            

        </div><!-- /.section -->
        

    </div><!-- /.container -->
    
        
    <div class="section-colored1">

        <div class="container-fluid">

            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                <div class="col-lg-5 col-md-6 col-sm-6 text-center">
<?php echo $this->Html->image('mac.png', array('alt' => 'responsive image', 'class' => 'img-responsive mac', 'style' => 'margin: 0 auto;')); ?>                </div>    
                <div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-6">      
                        
                        <h3 style="color:#65b7f2">Besoin de modifier quelque chose?</h3><br>
                        <h4>                        
                        <?php echo $this->Html->image('triangle90.png', array('alt' => 'responsive image', 'class' => 'img-responsive uneligne')); ?> Gérez vos bacs en ligne sans bouger de chez vous<br><br>
                           <?php echo $this->Html->image('triangle90.png', array('alt' => 'responsive image', 'class' => 'img-responsive uneligne')); ?> Récupérez vos affaires quand vous le souhaitez<br><br>
                            <?php echo $this->Html->image('triangle90.png', array('alt' => 'responsive image', 'class' => 'img-responsive uneligne')); ?> Retrouvez un item en 2 clics avec l'inventaire en ligne</h4>     
                            
                        
                        
                          
                </div>   
            </div>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.section-colored -->

    <div class="section">

        <div class="container-fluid">

            <div class="row">

                
                    <div class="row bandeau">
                        <h2 class="text-center" id="prix">Combien ça coûte?</h2>
                        
                    </div><hr>
                
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                <div class="col-lg-4 col-md-4 col-sm-4 largeur">
                  <?php echo $this->Html->image('contenu_bac.png', array('alt' => 'responsive image', 'class' => 'img-responsive img-home-portfolio"', 'style' => 'margin: 0 auto;')); ?>    
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 largeur">
                    <hr>
                  <?php echo $this->Html->image('bac_dim.png', array('alt' => 'responsive image', 'class' => 'img-responsive img-home-portfolio"', 'style' => 'margin: 0 auto;')); ?>    
                    
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 cadre4 largeur">
                    <h3 style="background-color:#65b7f2;text-align:center;color:white;padding:2%">6,25€ par bac/mois</h3>
                    <ul>
                        <li style="color:#898989"> 4 bacs minimum</li>
                        <li style="color:#898989"> 3 mois minimum</li>
                        <li style="color:#898989"> livraisons des bacs vides gratuites</li>
                        <li style="color:#898989"> Récupérations des bacs pleins chez vous gratuites</li>
                        <li style="color:#898989"> Récupérations de vos bacs en stock : 20€+2€/bac</li>
                    </ul>
                    <?php 
                    if(!($this->Session->check('Auth.User.id')) ){
                    ?>
                        <p style="text-align:center"><a class="btn btn-lg" href='<?= $this->Html->url(array('controller' => 'users', 'action' => 'register')); ?>' style="background-color:#f75900;color:white" href="#modalDialog" role="button">Je m'inscris</a></p>
                    <?php
                    }
                    ?>

                    
                
                </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section -->
    <div class="section couleurfond">
        <div class="row bandeau" id="securite">
            <h2  class="text-center">Sécurité</h2>
        </div><hr>
        <div class="container-fluid" style="color:#424242; margin:3% 20%">
            
            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                  <?php echo $this->Html->image('camera.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>    
                </div>
                <div class="col-lg-8 col-md-7">
                    <h4>Vos bacs sont stockés dans un entrepôt sécurisé et monitoré 24h/24</h4><br><br>
                </div>
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                  <?php echo $this->Html->image('cadenas.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>    
                </div>
                <div class="col-lg-8 col-md-7">
                    <h4>Nous vous fournissons des scellés à usage unique pour fermer vos bacs</h4><br><br>
                </div>
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                  <?php echo $this->Html->image('ordi.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>    
                </div>
                <div class="col-lg-8 col-md-7">
                    <h4>Avec l'inventaire en ligne vous êtes toujours au courant de ce que vous avez stocké</h4><br><br>

                </div>
            </div>
            <!-- /.row -->
            
        </div>
    <!-- /.container -->
    </div>

