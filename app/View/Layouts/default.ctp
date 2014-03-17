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
    <?= $this->Html->script('jquery-ui-1.10.4.custom.min');?>

    <?= $this->Html->script('bootstrap');?>

    <?= $this->fetch('css');?>

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
                    <li><a href="#prix">Prix</a></li>
                    <li><a href="#securite">Sécurité</a></li>
                    <li> <a href="faq.html">FAQ</a></li>
                    <li>
                        <a href="#contact">Contact</a>
                        
                    </li>


                    <?php
                    if(empty($this->request->params['pass'][0]) || (!empty($this->request->params['pass'][0]) && $this->request->params['pass'][0] == 'home') ){
                    ?>
                    <li>
                            <!-- MENU -->
                    <li class="dropdown">
                        <?php // #### Menu loggé ####
                        if($this->Session->read('Auth.User.id')):
                        ?>

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon compte<b class="caret"></b></a>
                        <ul class="dropdown-menu">


                            <li>
                            <?php echo $this->Html->link(
                                    'Commander des bacs',
                                    array(
                                        'controller'    => 'orders',
                                        'action'        => 'step1',
                                        'full_base'     => true,
                                        'admin'         => false
                                    )
                                );?>
                            </li>


                            <li>
                            <?php echo $this->Html->link(
                                    'Mes affaires',
                                    array(
                                        'controller' => 'users',
                                        'action' => 'my_bacs',
                                        'full_base'     => true,
                                        'admin'         => false                   
                                        )
                                );?>
                            </li>

                            <li>
                            <?php echo $this->Html->link(
                                    'Mes commandes',
                                    array(
                                        'controller' => 'users',
                                        'action' => 'my_account#livraisons',
                                        'full_base'     => true,
                                        'admin'         => false                                    
                                        )
                                );?>
                            </li>  

                            <li>
                            <?php echo $this->Html->link(
                                    'Modifier infos compte',
                                    array(
                                        'controller' => 'users',
                                        'action' => 'my_account#profil',
                                        'full_base'     => true,
                                        'admin'         => false                                    
                                        )
                                );?>
                            </li>  

                            <li>
                            <?php echo $this->Html->link(
                                    'Logout',
                                    array(
                                        'controller' => 'users',
                                        'action' => 'logout',
                                        'full_base'     => true,
                                        'admin'         => false                                    
                                        )
                                );?>
                            </li>  


                            <?php
                            // #### Menu non loggé ####
                            else:
                            ?>

                                <li>
                                <?php echo $this->Html->link(
                                        "S'enregistrer",
                                        array(
                                            'controller' => 'users',
                                            'action' => 'register',
                                        'full_base'     => true,
                                        'admin'         => false                                        
                                        )
                                    );?>
                                </li>
                               <li>
                                <?php echo $this->Html->link(
                                        'Login',
                                        array(
                                            'controller' => 'users',
                                            'action' => 'login',
                                        'full_base'     => true,
                                        'admin'         => false                                        
                                        )
                                    );?>
                                </li>



                            <?php
                            endif;
                            ?>
                            </ul>
                            <!-- /MENU -->
                        <?php
                        }
                   
                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->


    </nav>


<?php
if(!empty($this->request->params['pass'][0]) && ($this->request->params['pass'][0] == 'landing' || $this->request->params['pass'][0] == 'home') ){
?> 


    <div class="image_de_fond">


        <div class="container-fluid">

            <div class="logo-wrapper2">
                <?php if(!$this->Session->read('Auth.User.id')): ?>
                    <h2 class="gras">A L'ETROIT CHEZ VOUS ?</h2>
                    <h4 class="gras">Imaginez un placard dans les nuages</h4><br>
                    <h4 style="color:#424242">Parce que le self-stockage traditionnel est trop contraignant,
                        nous nous occupons de tout pour vous&nbsp;: récupération de vos affaires, stockage et livraison à la demande.</h4>

                 <?php else:?>
                    <a href="<?= $this->Html->url(array('controller' => 'users', 'action' => 'my_bacs')); ?>"><button type"submit" class="btn-lg color-btn margin25" >Mes affaires en stock</button></a>
                    <br />
                    <a href="<?= $this->Html->url(array('controller' => 'orders', 'action' => 'step1')); ?>"><button type"submit" class="btn-lg color-btn" >Prévoir une livraison de bacs vides</button></a>

                <?php endif;?>
            </div>


        </div>
    </div>

<?php
}
else {
?>


    <div class="image_de_fond">
        <div class="container-fluid">

        </div>
    </div>
<?php
}
?>

<div class="row">
        
            <?= $this->Session->flash();?>
            <?= $this->Session->flash('auth');?>




        <?= $this->fetch('content');?>

</div>          
    <!-- /CONTENT -->
       
    
    
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
    <?= $this->fetch('script');?>
    <?= $this->fetch('datepicker');?>
    <!-- JavaScript -->
  

</body>

</html>
