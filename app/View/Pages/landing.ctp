<?= $this->Html->script('jquery-1.10.2', array('inline' => true)); ?>
<?= $this->Html->script('jquery.cookie', array('inline' => true)); ?>
<?= $this->Html->script('mjpopup.1.0.0', array('inline' => true)); ?>

<script type='text/javascript'>
$(document).ready(function() { 
$(this).mjpopup({ 
            //active debug 
            'debug' : false, 
            //click or no 
            'onClick': { 
                'active' : true, 
                'class' : 'newsletter' 
            }, 
            //cookie 
            'cookie' : { 
                'active' : false, 
                'name' : 'mjpopup', 
                'time' : 1 
            }, 

            //create overlay 
            'overlay': { 
                'class': 'popup_overlay', 
                'closeOnClick': true, 

                'css': { 
                    'background' : 'rgba(0,0,0,0.3)', 
                    'backgroundRepeat' : 'repeat', 
                    'zIndex' : 999, 
                    'width' : '100%', 
                    'position' : 'absolute', 
                    'top' :0, 
                    'height' : jQuery(document).height() 
                } 
            }, 

            //create div popup 
            'popup': { 
            'class': 'popup_div_view', 
            'width': 940, 
            'height': 538, 
            'css': { 

                'borderWidth': 2, 
                'borderColor': '#D0D0D0', 
                'borderStyle': 'solid', 
                'borderRadius': '6px 0px 6px 6px', 
                'float' : 'left', 
                'height' : '100%', 
                'width' :'100%',
                'position' : 'relative', 
                'zIndex' : 999999 
            }, 
            'htmlpopup' : '<IFRAME src="http://eepurl.com/P94pr" width="100%" height="100%"></IFRAME>' 
            }, 

            //close button 
            'close': { 
                'text' : 'fermer',

                //string and One word 
                'class' : 'close', 
                'EscClose': true, 
                'css': { 
                    'color' : 'black', 
                    'display' : 'block', 
                    'float' : 'right', 
                    'padding' : '4px 9px', 

                    //px or em 
                    'backgroundColor' : '#D0D0D0', 
                    'fontSize' : '12px', 

                    //px 
                    'borderRadius' : '2px 2px 0 0', 
                    'textTransform' : 'uppercase', 
                    'fontWeight' : 'bold', 
                    'cursor' : 'pointer', 
                    'zIndex' : 999999 
                } 
            }, 

            //effect appearance/disappearance for background 
            'effect': { 
                'bgIn': 'fade', 
                'bgTime' : 800, 
                'bgOut' : 'fade', 
                'popupIn' : 'slide', 
                'popupTime' : 1000, 
                'popupOut' : 'slide' 
            } 
    }); 
});
</script>


    <div class="image_de_fond">
        <div class="container-fluid">
            <div class="logo-wrapper1">
                <h2 class="gras">VOS PLACARDS DEBORDENT :</h2>
                <h4 class="gras">Réappropriez-vous votre espace avec un placard dans les nuages</h4><br>
                <h4>Parce que le self-stockage traditionnel est trop contraignant,
                    nous nous occupons de tout pour vous : récupération de vos affaires, stockage et livraison à la demande.</h4>
                
            </div>
        </div>
    </div>

        <div class=" container-fluid section">
                <div class="row bandeau">
                    <h2  class="text-center">Pré-commande</h2>
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
                                <h5><em>La prise de commande payante reprendra le 16 Avril selon disponibilité des bacs.</em></h5>
                                <hr>
                            </div>    
                        <div class="col-lg-5 col-lg-offset-1 col-md-6 col-sm-6 ">
                                <div class="cadre2">
                                    <h3 style="background-color:#65b7f2;text-align:center;color:white;padding:2%">Pré-commande mode d'emploi</h3>
                                    <ul>
                                        <li style="color:#898989"> Stock limité à 500 bacs</li>
                                        <li style="color:#898989"> De 4 à 10 bacs maximum par personne</li>
                                        <li style="color:#898989"> 1er inscrit, 1er servi</li>
                                        <li style="color:#898989"> Livraisons/Récupérations à Paris uniquement</li>
                                        <li style="color:#898989"> Fin de l'offre : 15 Avril 2014</li>
                                        <li style="color:#898989"> Inventaire en ligne disponible le jour de la récupération</li>
                                    </ul>
                                    <p style="text-align:center"><span class="btn btn-lg newsletter" style="background-color: #6ee865;color:white" href="#" role="button">Je m'inscris</span></p>
                                    <hr>
                                    <p>Inscrivez-vous, nous vous recontacterons pour fixer des dates de livraisons de bacs vides et répondre à vos questions</p>
                                </div>    
                                <hr>
                        
                        </div>
                    </div>
                </div>

        </div>
    <!-- /.container -->               
    
    <div class="container-fluid row">
        <div class="section">
            <div class="row bandeau">
                <h2 id="comment" class="text-center">Comment ça marche?</h2>
            </div><br>
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
            <div class="row">
                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-4 largeur">
                        
                            <?php echo $this->Html->image('un.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                        
                    </div>
                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-4 largeur">
                        
                            <?php echo $this->Html->image('deux.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                        
                    </div>
                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-4 largeur">
                        
                            <?php echo $this->Html->image('trois.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                        
                    </div>
            </div><!-- /.row -->
            </div>
            </div>

        </div><!-- /.section -->
        

    </div><!-- /.container -->
    
        
    <div class="section-colored1">

        <div class="container-fluid">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                <div class="col-lg-5 col-md-6 col-sm-6 text-center">
                    <?php echo $this->Html->image('mac.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>                </div>    
                <div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-6">      
                        
                        <h3 style="color:#65b7f2">Besoin de modifier quelque chose?</h3>
                        <h4>Gérer vos bacs en ligne sans bouger de chez vous<br><br>
                            Récupérez vos affaires quand vous le souhaitez<br><br>
                            Retrouvez un item en 2 clics avec l'inventaire en ligne</h4>     
                </div>   
            </div>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.section-colored -->

    <div class="section">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 text-center">
                    <div class="row bandeau">
                        <h2 id="prix">Combien ça coûte?</h2>
                        
                    </div><hr>
                </div>
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                <div class="col-lg-4 col-md-4 col-sm-4 largeur">
                    <?php echo $this->Html->image('contenu_bac.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 largeur">
                    <hr>
                    <?php echo $this->Html->image('bac_dim.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                    
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 cadre2 largeur">
                    <h3 style="background-color:#65b7f2;text-align:center;color:white;padding:2%">6,25€ par bac/mois</h3>
                    <ul>
                        <li style="color:#898989"> 4 bacs minimum</li>
                        <li style="color:#898989"> 3 mois minimum</li>
                        <li style="color:#898989"> livraisons des bacs vides gratuites</li>
                        <li style="color:#898989"> Récupérations des bacs pleins chez vous gratuites</li>
                        <li style="color:#898989"> Récupérations de vos bacs en stock : 20€+2€/bac</li>
                    </ul>
                    <p style="text-align:center"><a class="btn btn-lg" style="background-color:#6ee865;color:white" role="button">Je m'inscris</a></p>
                    
                
                </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section -->
    <div class="section couleurfond">
        <div class="row bandeau">
            <h2 id="securite" class="text-center">Sécurité</h2>
        </div><hr>
        <div class="container" style="color:#898989">

            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                    <?php echo $this->Html->image('camera.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                </div>
                <div class="col-lg-7 col-md-7">
                    <h4>Vos bacs sont stockés dans un entrepôt sécurisé et monitoré 24h/24</h4><br><br>
                </div>
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                     <?php echo $this->Html->image('cadenas.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                </div>
                <div class="col-lg-7 col-md-7">
                    <h4>Nous vous fournissons des scellés à usage unique pour fermer vos bacs</h4><br><br>
                </div>
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                    <?php echo $this->Html->image('ordi.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                </div>
                <div class="col-lg-7 col-md-7">
                    <h4>Avec l'inventaire en ligne vous êtes toujours au courant de ce que vous avez stocké</h4><br><br>

                </div>
            </div>
            <!-- /.row -->

        </div>
    <!-- /.container -->
    </div>
