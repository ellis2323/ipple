<!-- BACKGROUND IMAGE TOP  -->
    <div class="image_de_fond">
        <div class="container-fluid">
            <div class="logo-wrapper">
                <h2>Besoin d'espace</h2>
                <h3>Faites de la place chez vous</h3>
                <h4>Nous récupérons, stockons et livrons vos affaires à la demande</h4>
<<<<<<< HEAD
                <p><a class="btn btn-lg btn-primary" href="<?php echo $this->Html->url(
                                    array(
                                        'controller' => 'users',
                                        'action' => 'register',
                                        'full_base'     => true,
                                        'admin'         => false                                    )
=======
                <p><a class="btn btn-lg btn-primary" href=" <?php echo $this->Html->url(
                                    array(
                                        'controller'    => 'users',
                                        'action'        => 'register',
                                        'full_base'     => true,
                                        'admin'         => false
                                    )
>>>>>>> d8361b54069cdc57ba0f62fb2cc81fed3454a661
                                );?>" role="button" style="background-color:#65b7f2;color:white">Je démarre</a></p>
            </div>
        </div>
    </div>           
<!-- BACKGROUND IMAGE TOP  -->


<div class="container-fluid">
<!-- DEBUT SECTION 1-->
        <div class="section">
            <h2 id="comment" class="text-center">Comment ça marche?</h2><br>
            <div clas="col-lg-9 col-lg-offset-1">
            <div class="row">
                    <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-4">
                        
                            <?php echo $this->Html->image('un.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                        
                    </div>
                    <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-4">
                        
                            <?php echo $this->Html->image('deux.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                        
                    </div>
                    <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-4">
                        
                            <?php echo $this->Html->image('trois.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>

                    </div>
            </div><!-- /.row -->
            </div>

        </div><!-- /.section -->
        

    </div><!-- /.container -->
<!-- FIN SECTION 1-->
        

<!-- SECTION 2-->
    <div class="section-colored ">

        <div class="container-fluid">

            <div class="col-lg-5 col-md-6 col-sm-6 text-center">
                <?php echo $this->Html->image('mac.png', array('alt' => 'responsive image', 'class' => 'img-responsive mac')); ?>

            </div>    
            <div class="col-lg-7 col-md-6 col-sm-6">      
                <div class="cadre">    
                    <h3 style="color:#65b7f2">Besoin de récupérer quelque chose?</h3>
                    <h4>Gérer vos bacs en ligne.<br>
                        Récupérez tout ou partie de vos bacs dès le lendemain.</h4>     
                </div>        
                    <h3>Intéressé(e) mais pas encore prêt(e)</h3>
                    <h4>Entrez votre email pour recevoir des offres</h4>
                    <div class="input-group">
                            
                        <input type="email" class="form-control" placeholder="Votre Email">
                            <span class="input-group-btn">
                                <button class="btn" type="submit" style="background-color:#002147;color:white">s'inscrire</button>
                            </span>
                    </div><!-- /input-group -->
                    
                      
            </div>   

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section-colored -->
<!-- FIN SECTION 2 -->


<!-- SECTION 3 -->
    <div class="section">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 text-center">
                    
                    <h2 id="prix">Combien ça coûte?</h2>
                    <hr>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <?php echo $this->Html->image('contenu_bac.png', array('alt' => 'responsive image', 'class' => 'img-responsive img-home-portfolio')); ?>

                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">

                    <?php echo $this->Html->image('bac_dim.png', array('alt' => 'responsive image', 'class' => 'img-responsive img-home-portfolio')); ?>
                    
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 cadre2">
                    <h3 style="background-color:#65b7f2;text-align:center;color:white;padding:2%">6,25€ par bac/mois</h3>
                    <ul>
                        <li style="color:#898989"> 4 bacs minimum</li>
                        <li style="color:#898989"> 3 mois minimum</li>
                        <li style="color:#898989"> livraisons des bacs vides gratuites</li>
                        <li style="color:#898989"> Récupérations des bacs pleins chez vous gratuites</li>
                        <li style="color:#898989"> Récupérations de vos bacs en stock : 20€+2€/bac</li>
                    </ul>
                    <p style="text-align:center"><a class="btn btn-lg" style="background-color:#65b7f2;color:white" href="<?php echo $this->Html->url(
                                    array(
                                        'controller' => 'users',
                                        'action' => 'register',
                                        'full_base'     => true,
                                        'admin'         => false                                    )
                                );?>" role="button">Je démarre</a></p>
                    
                
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section -->
<!-- FIN SECTION 3 -->


<!-- SECTION 4 -->
    <div class="section couleurfond">
        <h2 id="securite" class="text-center">Sécurité</h2>
        <hr>
        <div class="container" style="color:#898989">

            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                    <?php echo $this->Html->image('camera.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>

                </div>
                <div class="col-lg-7 col-md-7">
                    <h4>Vos bacs sont stockés dans un entrepôt sécurisé et monitoré 24h/24</h4>
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                    <?php echo $this->Html->image('cadenas.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                </div>
                <div class="col-lg-7 col-md-7">
                    <h4>Nous vous fournissons des scellés à usage unique pour fermer vos bacs</h4>
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                    <?php echo $this->Html->image('ordi.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                </div>
                <div class="col-lg-7 col-md-7">
                    <h4>Avec l'inventaire en ligne vous êtes toujours au courant de ce que vous avez stocké</h4>

                </div>
            </div>
            <!-- /.row -->

        </div>
    <!-- /.container -->
        

    </div>
    <!-- /.section -->

<!-- FIN SECTION 4 -->