<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title_for_layout; ?></title>



<? echo $this->Html->css('bootstrap'); // On charge les fichiers CSS
    echo $this->Html->css('dezordre');
?>

</head>

<body>
        <!-- MENU FIXE -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                <a class="navbar-brand" href="index.html"><span style="color:#65b7f2">dé</span><span style="color:#002147">z</span><span style="color:#65b7f2">ordre</span> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#comment">Comment ça marche?</a>
                    </li>
                    <li><a href="#prix">Prix</a>
                    </li>
                    <li><a href="#securite">Sécurité</a>
                    </li>
                    <li>
                        <a href="faq.html">FAQ</a>
                        
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                        
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Se connecter<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                            <?php echo $this->Html->link(
                                    'Login',
                                    array(
                                        'controller' => 'users',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );?>
                            </li>
                            <li><a href="creation compte.html">créer mon compte</a>
                            </li>
                            <li><a href="compteclient.html">Mon compte</a>
                            </li>
                            <li><a href="commander des bacs.html">Commander des bacs</a>
                            </li>
                            <li><a href="mes affaires.html">Mes affaires</a>
                            </li>
                            <li><a href="faq.html">FAQ</a>
                            </li>
                            <li><a href="404.html">404</a>
                            </li>
                            <li><a href="">Se déconnecter</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- FIN MENU FIXE -->


<!-- BACKGROUND IMAGE TOP  -->
    <div class="image_de_fond">
        <div class="container-fluid">
            <div class="logo-wrapper">
                <h2>Besoin d'espace</h2>
                <h3>Faites de la place chez vous</h3>
                <h4>Nous récupérons, stockons et livrons vos affaires à la demande</h4>
                <p><a class="btn btn-lg btn-primary" href="creation compte.html" role="button" style="background-color:#65b7f2;color:white">Je démarre</a></p>
            </div>
        </div>
    </div>           
<!-- BACKGROUND IMAGE TOP  -->


<!-- CONTENT -->
    <div class="container-fluid">

        <?= $this->Session->flash();?>
      	<?= $this->fetch('content'); ?>

<!-- FIN CONTENT -->

<!-- FOOTER -->
    <div class="section">
        
    <div class="contact">
        
            <div class="container-fluid">
                <div class="row">
                    
                    <h2 id="contact" class="text-center">Contact</h2>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <h4><span class="glyphicon glyphicon-envelope"></span><a href="#"> contact@dezordre.com</a></h4>
                            <h4><span class="glyphicon glyphicon-earphone"></span> (+33) 09.09.09.09.09</h4>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <h3>A propos</h3>
                            <p><a href="faq.html">FAQ</a></p>
                            <p><a href="#">CGV</a></p>
                            <p><a href="#">BLOG</a></p>
                            <p><a href="#">Mentions légales</a></p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <h3>Suivez-nous!</h3>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <a href="https://www.facebook.com/pages/Dezordre/265749423573092?fref=ts">
                                   <?php echo $this->Html->image('facebook.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <a href="https://www.facebook.com/pages/Dezordre/265749423573092?fref=ts">
                                   <?php echo $this->Html->image('twitter.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
    </div>



        <footer>
            <p class="text-center">dézordre, 10 rue de l'Amiral Courbet 94 160 Saint-Mandé - Ouvert 6j/7 de 8h30à 19h</p>
        </footer>
    <!-- FIN FOOTER -->
    <!-- /.container -->

    <!-- JavaScript -->
    <?= $this->Html->script('jquery-1.10.2'); ?>
    <?= $this->Html->script('bootstrap'); ?>
    <?= $this->Html->script('modern-business'); ?>

</body>

</html>



