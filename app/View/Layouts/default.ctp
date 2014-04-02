<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
    
        <title>dézordre</title>
    
        <!-- Bootstrap core CSS -->
        <?= $this->Html->css('bootstrap');?>
        <?= $this->Html->css('dezordre');?>
    
        <?= $this->Html->script('jquery-1.10.2'); ?>
        <?= $this->Html->script('jquery-ui-1.10.4.custom.min'); ?>
        <?= $this->Html->script('jquery.ui.datepicker-fr.js'); ?>
        
        <?= $this->fetch('css');?>
    
    </head>
    
    <body>
    
         <!-- Header -->
        <?=$this->element('header')?>
    
         <!-- Sub-Header -->
        <?=$this->element('sub-header')?>
        
        

        <!-- Message d'erreur/information -->
        <?= $this->Session->flash();?>
        <?= $this->Session->flash('auth');?>
        
        <!-- Content -->
        <?= $this->fetch('content');?>
        
        
    
         <!-- Footer -->
        <?=$this->element('footer')?>
    
    
    
         <!-- JavaScript -->
        <?= $this->fetch('script');?>
        <?= $this->Html->script('bootstrap');?>
        <?= $this->Html->script('cakebootstrap');?>
        <?= $this->fetch('datepicker');?>
        <?= $this->fetch('datepicker2');?>
        <?= $this->fetch('tabs');?>
        <?= $this->fetch('radio_control');?>
      
    
    </body>

</html>
