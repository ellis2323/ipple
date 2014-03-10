<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- start: Meta -->
    <meta charset="utf-8" />
    <title>Dezordre - Admin Panel</title>
    <meta name="description" content="SimpliQ - Flat & Responsive Bootstrap Admin Template." />

    <meta name="keyword" content="SimpliQ, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina" />
    <!-- end: Meta -->
    
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- end: Mobile Specific -->
    
    <!-- start: CSS -->
    <?= $this->Html->css('admin/bootstrap.min');?>
    <?= $this->Html->css('admin/bootstrap-responsive.min');?>
    <?= $this->Html->css('admin/bootstrap.min');?>
    <?= $this->Html->css('admin/style.min');?>
    <?= $this->Html->css('admin/style-responsive.min');?>
    <?= $this->Html->css('admin/retina');?>
    <!-- end: CSS -->


        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
    <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="main-menu-toggle" class="hidden-phone open"><i class="icon-reorder"></i></a>     
                <div class="row-fluid">
                <a class="brand span2" href="index.html"><span>Dezordre</span></a>
                </div>      
                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">

                        <li class="dropdown hidden-phone">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-warning-sign"></i>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li class="dropdown-menu-title">
                                    <span>You have 11 notifications</span>
                                </li>   
                                <li>
                                    <a href="#">
                                        <span class="icon blue"><i class="icon-user"></i></span>
                                        <span class="message">New user registration</span>
                                        <span class="time">1 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="icon-comment-alt"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">7 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="icon-comment-alt"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">8 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="icon-comment-alt"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">16 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon blue"><i class="icon-user"></i></span>
                                        <span class="message">New user registration</span>
                                        <span class="time">36 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon yellow"><i class="icon-shopping-cart"></i></span>
                                        <span class="message">2 items sold</span>
                                        <span class="time">1 hour</span> 
                                    </a>
                                </li>
                                <li class="warning">
                                    <a href="#">
                                        <span class="icon red"><i class="icon-user"></i></span>
                                        <span class="message">User deleted account</span>
                                        <span class="time">2 hour</span> 
                                    </a>
                                </li>
                                <li class="warning">
                                    <a href="#">
                                        <span class="icon red"><i class="icon-shopping-cart"></i></span>
                                        <span class="message">Transaction was canceled</span>
                                        <span class="time">6 hour</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="icon-comment-alt"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">yesterday</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon blue"><i class="icon-user"></i></span>
                                        <span class="message">New user registration</span>
                                        <span class="time">yesterday</span> 
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                                    <a>View all notifications</a>
                                </li>   
                            </ul>

                        </li>


                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn account dropdown-toggle" data-toggle="dropdown" href="#">
                                <div class="user">
                                    <span class="hello">Bonjour,</span>
                                    <span class="name"><?= $this->Session->read('Auth.User.email');?></span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">
                                    
                                </li>
                                <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                                <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                                <li><a href="#"><i class="icon-envelope"></i> Messages</a></li>
                                <li><a href="<?= $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'admin' => false));?>"><i class="icon-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->
                
            </div>
        </div>
    </div>
    
    <!-- start: Header -->
    
        <div class="container-fluid-full">
        <div class="row-fluid">
                
            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                
                <div class="row-fluid actions">
                                                    
                    <input type="text" class="search span12" placeholder="..." />
                
                </div>  
                
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="<?= $this->Html->url(array('controller' => 'users', 'action' => 'index', 'admin' => true));?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Utilisateurs</span></a></li>

                        <li><a href="<?= $this->Html->url(array('controller' => 'orders', 'action' => 'index', 'admin' => true));?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Commandes</span></a></li>

                        <li><a href="<?= $this->Html->url(array('controller' => 'bacs', 'action' => 'index', 'admin' => true));?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Bacs</span></a></li>

                        <li><a href="<?= $this->Html->url(array('controller' => 'locks', 'action' => 'index', 'admin' => true));?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Scellés</span></a></li>

                        <li><a href="<?= $this->Html->url(array('controller' => 'cities', 'action' => 'index', 'admin' => true));?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Villes</span></a></li>

                        <li><a href="<?= $this->Html->url(array('controller' => 'hours', 'action' => 'index', 'admin' => true));?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Créneaux</span></a></li>

                        <li><a href="<?= $this->Html->url(array('controller' => 'hours_blocks', 'action' => 'index', 'admin' => true));?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Créneaux bloquées</span></a></li>                    

                        <li><a href="<?= $this->Html->url(array('controller' => 'dates_blocks', 'action' => 'index', 'admin' => true));?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dates bloquées</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- end: Main Menu -->
                        
            <!-- start: Content -->
            <div id="content" class="span10" style='min-height:600px !important;'>
            

        <?= $this->Session->flash();?>
        <?= $this->Session->flash('auth');?>

        <?= $this->fetch('content'); ?>




            
            </div>
            <!-- end: Content -->
                
                </div><!--/fluid-row-->
                
        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        <footer>
            <p>
                <span style="text-align:left;float:left">&copy; 2013 <a href="http://bootstrapmaster.com" alt="Bootstrap Themes">creativeLabs</a></span>
                <span class="hidden-phone" style="text-align:right;float:right">Powered by: <a href="http://admintemplates.co" alt="Bootstrap Admin Templates">SimpliQ</a></span>
            </p>

        </footer>
                
    </div><!--/.fluid-container-->

    <!-- start: JavaScript-->
    <?= $this->Html->script('admin/jquery-1.10.2.min');?>
    <?= $this->Html->script('admin/jquery-migrate-1.2.1.min');?>
    <?= $this->Html->script('admin/jquery-ui-1.10.3.custom.min');?>
    <?= $this->Html->script('admin/jquery.ui.touch-punch');?>
    <?= $this->Html->script('admin/modernizr');?>
    <?= $this->Html->script('admin/bootstrap.min');?>
    <?= $this->Html->script('admin/jquery.cookie');?>
    <?= $this->Html->script('admin/fullcalendar.min');?>
    <?= $this->Html->script('admin/jquery.dataTables.min');?>
    <?= $this->Html->script('admin/excanvas');?>
    <?= $this->Html->script('admin/jquery.flot');?>
    <?= $this->Html->script('admin/jquery.flot.pie');?>
    <?= $this->Html->script('admin/jquery.flot.stack');?>
    <?= $this->Html->script('admin/jquery.flot.resize.min');?>
    <?= $this->Html->script('admin/jquery.flot.time');?>
    <?= $this->Html->script('admin/jquery.chosen.min');?>
    <?= $this->Html->script('admin/jquery.uniform.min');?>
    <?= $this->Html->script('admin/jquery.cleditor.min');?>
    <?= $this->Html->script('admin/jquery.noty');?>
    <?= $this->Html->script('admin/jquery.elfinder.min');?>
    <?= $this->Html->script('admin/jquery.iphone.toggle');?>
    <?= $this->Html->script('admin/jquery.uploadify-3.1.min');?>
    <?= $this->Html->script('admin/jquery.gritter.min');?>
    <?= $this->Html->script('admin/jquery.imagesloaded');?>
    <?= $this->Html->script('admin/jquery.masonry.min');?>
    <?= $this->Html->script('admin/jquery.knob.modified');?>
    <?= $this->Html->script('admin/jquery.sparkline.min');?>
    <?= $this->Html->script('admin/counter.min');?>
    <?= $this->Html->script('admin/raphael.2.1.0.min');?>
    <?= $this->Html->script('admin/jquery.autosize.min');?>
    <?= $this->Html->script('admin/retina');?>
    <?= $this->Html->script('admin/jquery.placeholder.min');?>
    <?= $this->Html->script('admin/wizard.min');?>
    <?= $this->Html->script('admin/core.min');?>
    <?= $this->Html->script('admin/charts.min');?>
    <?= $this->Html->script('admin/custom.min');?>

 

    <!-- end: JavaScript-->
    
</body>
</html>            
