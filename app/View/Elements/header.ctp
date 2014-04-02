<div id="header" class="container-fluid">
    <div class="row">

		<!-- Menu -->
        <div class="menu navbar col-md-offset-1 col-md-10" role="navigation">
        
            <div class="navbar-header">
            
            	<!-- Bouton smartphone -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!-- Logo -->
                <a class="navbar-brand" href="<?=$this->Html->url('/')?>">                   
                    <?=$this->Html->image('logo2.png', array('alt' => 'responsive image', 'class' => 'img-responsive'))?>
                </a>
                
            </div>
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            
                <ul class="nav navbar-nav navbar-right">

                    <!-- Menu principal -->
                    <li><a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'display', 'home', '#' => 'prix') );?>">Prix</a></li>
                    <li><a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'display', 'home', '#' => 'securite') );?>">Sécurité</a></li>
                    <li><a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'display', 'faq') );?>">F.A.Q</a></li>
                    <li><a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'display', 'home', '#' => 'contact')  );?>">Contact</a></li>

                    <!-- Menu admin -->
                    <?php if($this->Session->read('Auth.User.role') >= 90) { ?>
                    
                        <li>
                            <?php echo $this->Html->link(
                                'Admin panel',
                                array(
                                    'controller'    => 'users',
                                    'action'        => 'index',
                                    'full_base'     => true,
                                    'admin'         => true
                                )
                            );?>
                        </li>
                        
                    <?php } ?>
                    
                    <!-- Menu utilisateur connecté -->
                    <?php if($this->Session->check('Auth.User')) { ?>

                        <li class="dropdown">
                        
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $this->Session->read('Auth.User.email');?><b class="caret"></b></a>
    
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
    
                            </ul> 
                            
                        </li>
                        
                    <!-- Menu utilisateur non connecté -->
                    <?php } else { ?>
    
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

                    <?php } ?>
                    
                </ul>
                    
            </div>
            
        </div>
    
    </div>
</div>