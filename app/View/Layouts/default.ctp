<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title_for_layout; ?></title>


    <?= $this->Html->css('bootstrap');?>
    <?= $this->Html->css('dezordre');?>
    <?= $this->fetch('css');?>


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
                 <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'display', 'landing'));?>">
                    <?php echo $this->Html->image('logo2.png', array('alt' => 'responsive image', 'class' => 'img-responsive', 'style' => 'position:relative; top:-18px;')); ?>
                </a>
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
                            <?php
                            // Si admin
                            if($this->Session->read('Auth.User.role') >= 90):
                            ?>
                               <li>
                                <?php echo $this->Html->link(
                                        'Admin Panel',
                                        array(
                                            'controller' => 'users',
                                            'action' => 'admin_index',
                                            'full_base' => true,
                                            'admin' => true
                                        )
                                    );?>
                                </li>   

                            <?php
                            endif;
                            ?>

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
                                        'action'        => 'add',
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
                                        'admin'         => false                                    )
                                );?>
                            </li>

                            <li>
                            <?php echo $this->Html->link(
                                    'Mes commandes',
                                    array(
                                        'controller' => 'orders',
                                        'action' => 'index',
                                        'full_base'     => true,
                                        'admin'         => false                                    )
                                );?>
                            </li>  

                            <li>
                            <?php echo $this->Html->link(
                                    'Modifier infos compte',
                                    array(
                                        'controller' => 'users',
                                        'action' => 'edit',
                                        'full_base'     => true,
                                        'admin'         => false                                    )
                                );?>
                            </li>  

                            <li>
                            <?php echo $this->Html->link(
                                    'Logout',
                                    array(
                                        'controller' => 'users',
                                        'action' => 'logout',
                                        'full_base'     => true,
                                        'admin'         => false                                    )
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
                                        'admin'         => false                                        )
                                    );?>
                                </li>
                               <li>
                                <?php echo $this->Html->link(
                                        'Login',
                                        array(
                                            'controller' => 'users',
                                            'action' => 'login',
                                        'full_base'     => true,
                                        'admin'         => false                                        )
                                    );?>
                                </li>



                            <?php
                            endif;
                            ?>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->



<!-- CONTENT -->
   

        <?= $this->Session->flash();?>
        <?= $this->Session->flash('auth');?>

      	<?= $this->fetch('content'); ?>

<!-- FIN CONTENT -->

<!-- FOOTER -->
    <div class="section">
        
    <div class="contact">
        
            <div class="container-fluid">
                <div class="row">
                    
                    <h2 id="contact" class="text-center">Contact</h2>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <h4><span class="glyphicon glyphicon-envelope"></span><a href="mailto:contact@dezordre.com">contact@dezordre.com</a></h4>
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
            <p class="text-center">Dézordre, 10 rue de l'Amiral Courbet 94 160 Saint-Mandé - Ouvert 6j/7 de 8h30 à 19h</p>
        </footer>
    <!-- FIN FOOTER -->
    <!-- /.container -->

    <!-- JavaScript -->
    <?= $this->Html->script('jquery-1.10.2'); ?>

    <?= $this->Html->script('bootstrap'); ?>
    <?= $this->Html->script('modern-business'); ?>
    <?= $this->fetch('script');?>
    <?= $this->fetch('datepicker');?>
    <?= $this->fetch('datepicker2');?>

</body>

</html>



