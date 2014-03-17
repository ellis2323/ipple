<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>dézordre</title>

    <!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap');?>
    <?= $this->Html->css('dezordre');?>

    <?= $this->Html->script('jquery-1.10.2');?>
    <?= $this->Html->script('bootstrap');?>

</head>

<body>

    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                <a class="navbar-brand" href="index.html">                   
                    <?php echo $this->Html->image('logo2.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#comment">Comment ça marche?</a> </li>
                    <li><a href="#prix">Prix</a></li>
                    <li><a href="#securite">Sécurité</a></li>
                    <li> <a href="faq.html">FAQ</a></li>
                    <li>
                        <a href="#contact">Contact</a>
                        
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <div class="image_de_fond">
        <div class="container-fluid">
            <div class="logo-wrapper2">
                <h2 class="gras">A L'ETROIT CHEZ VOUS ?</h2>
                <h4 class="gras">Imaginez un placard dans les nuages</h4><br>
                <h4 style="color:#424242">Parce que le self-stockage traditionnel est trop contraignant,
                    nous nous occupons de tout pour vous&nbsp;: récupération de vos affaires, stockage et livraison à la demande.</h4>
                
            </div>
        </div>
    </div>

        <div class=" container-fluid section">
                <div class="row bandeau">
                    <h2  class="text-center verti">Pré-commande</h2>
                </div>
                <div class="section-colored1 ">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                        <div class="col-lg-6 col-md-6 col-sm-6 text-justify">
                                <h4><br>Vos placards sont pleins? Vous pourriez stocker vos affaires dans un centre de stockage mais ils sont souvent inaccessibles, chers et, disons-le lugubre. Alors vous ne le faites pas. Nous avions le même problême.</h4>
                                <hr>
                                <h4>Dézordre met à votre disposition <strong>gratuitement</strong> un stock de 500 bacs pour une période de stockage de 2 mois. Sans frais.</h4>
                                <hr>
                                <h4>A la fin de ces 2 mois, vous pouvez récupérer vos affaires sans frais supplémentaire ou les laisser en stockage pour un coût de 6,25€/bac/mois (voir ci-dessous). C'est vous qui choisissez.</h4>
                                <hr>
                                <h5><em>La prise de commande payante reprendra le 14 Avril selon disponibilité des bacs.</em></h5>
                                <hr>
                        </div>
                        <div class="col-lg-1 col-md-1 vertical"> 
                            
                        </div>   
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                            <div class="cadre3">
                                    <h3 style="background-color:#65b7f2;text-align:center;color:white;padding:2%">Pré-commande mode d'emploi</h3>
                                    <ul>
                                        <li style="color:#898989"> Stock limité à 500 bacs</li>
                                        <li style="color:#898989"> De 4 à 7 bacs maximum par personne</li>
                                        <li style="color:#898989"> 1er inscrit, 1er servi</li>
                                        <li style="color:#898989"> Livraisons/Récupérations à Paris uniquement</li>
                                        <li style="color:#898989"> Fin de l'offre : 15 Avril 2014</li>
                                        <li style="color:#898989"> Inventaire en ligne disponible le jour de la récupération</li>
                                    </ul>
                                    <p style="text-align:center"><a class="btn btn-lg" style="background-color: #f75900;color:white" href="#modalDialog" role="button">Je m'inscris</a></p>
                                    <hr>
                                    
                                <div class="container-fluid">
                                    <div id="modalDialog" class="modalDialog">
                                        <div> 
                                            <a href="#close" title="Close" class="close">X</a>
                                            <form action="http://happymove.us7.list-manage.com/subscribe/post?u=fad05c9b1a9b05277fcba9dc6&amp;id=55a7ce533b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-horizontale" target="_blank" novalidate>
    
                                                          
                                                <h2 class="text-center">Réservez vos bacs</h2>
                                                <hr>
                                                <div class="choix">    
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="mce-FNAME" class="col-lg-4 col-md-4 col-sm-4 control-label">Nom<span class="blue">*</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input type="text" value="" name="FNAME" class="form-control" id="mce-FNAME">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">    
                                                        <div class="form-group">
                                                            <label for="mce-LNAME" class="col-lg-4 col-md-4 col-sm-4 control-label">Prénom<span class="blue">*</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input type="text" value="" name="LNAME" class="form-control" id="mce-LNAME">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="mce-EMAIL" class="col-lg-4 col-md-4 col-sm-4 control-label">Email<span class="blue">*</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input type="email" value="" name="EMAIL" class="required email form-control" id="mce-EMAIL">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="mce-MMERGE4" class="col-lg-4 col-md-4 col-sm-4 control-label">Combien de bacs souhaitez-vous?<span class="blue">*</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input type="number" name="MMERGE4" class="required form-control" value="" id="mce-MMERGE4">
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">   
                                                        
                                                            <label class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                                                                

                                                                
                                                                <input type="submit" value="Je réserve" name="subscribe" id="mc-embedded-subscribe" class="button" style="background-color:#65b7f2; color:white">
                                                            </label>
                                                            
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <hr>
                        
                        </div>
                    </div>
                </div>

        </div>
    <!-- /.container -->               
    
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
                    <p style="text-align:center"><a class="btn btn-lg" style="background-color:#f75900;color:white" href="#modalDialog" role="button">Je m'inscris</a></p>

                    
                
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

    
    <div class="section">     
    <div class="contact">
        
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                    
                    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <h3 id="contact">Contact</h3>
                            <h4><span class="glyphicon glyphicon-envelope"></span><a href="#"> support@dezordre.com</a></h4>
                            <h4><span class="glyphicon glyphicon-phone"></span> (+33) 09.09.09.09.09</h4>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <h3>A propos</h3>
                            <p><a href="faq.html">FAQ</a></p>
                            <p><a href="cgv_dezordre.pdf" target="_blank">CGV</a></p>
                            
                            <p><a href="#">Mentions légales</a></p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 ">
                            <h3>Suivez-nous!</h3>
                            <div class="col-lg-3 col-md-5 ">
                                <a href="https://www.facebook.com/pages/Dezordre/265749423573092?fref=ts" target='_blank'><?php echo $this->Html->image('facebook.png', array('alt' => 'responsive image', 'class' => 'img-responsive"')); ?>    
</a>
                            </div>
                            <div class="col-lg-3 col-md-5 ">
                                <a href="https://twitter.com/Dezordre" target='_blank'><?php echo $this->Html->image('twitter.png', array('alt' => 'responsive image', 'class' => 'img-responsive"')); ?>    
</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    
        <footer>
            <p class="text-center">dézordre, 10 rue de l'Amiral Courbet 94 160 Saint-Mandé - Ouvert 6j/7 de 8h30à 19h</p>
        </footer>
    
    
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>
