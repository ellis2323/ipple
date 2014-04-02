<?php
// Si l'utilisateur à des bacs
if(!empty($bacs)){
// If

?>

<?= $this->Form->create('Order'); ?>
<div class="section">
    <div class="row bandeau">
        <h2 class="text-center">Mes affaires</h2>
    </div><br>
    
    <p class="text-right">
    <br>
        <button type"submit" name='select_all' value='1' class="btn btn-sm btn-primary" style="background-color:#65b7f2;color:white">Récupérer tous mes bacs</button>


    <button type"submit" class="btn btn-sm btn-primary" style="background-color:#65b7f2;color:white">Récupérer les bacs selectionnés</button>
    </p>
    <!-- DEBUT CONTENT -->


        <!-- DEBUT LISTE BACS-->
        <div class="tab-pane fade active in" id="bacstock">

 <?php 
  foreach($bacs as $key):
  // Debut foreach

    ?>
        <!-- DEBUT ITEM -->
          <div class="un_bac"> 
              <div class="row">
                    
                      <?php 
                      if(!empty($key['Thumb']['file'])): 
                      ?>
                            <?= $this->Html->image($key['Thumb']['file'], array('width' => '250', 'height' => '250', 'class' => 'col-lg-3 col-md-3 col-sm-3 ' ) ); ?>

                      <?php 
                      else: 
                      ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 photo1">
                            <a href="#"><span class="glyphicon glyphicon-download-alt icone pull-right"></span></a>

                        </div>

                      <?php 
                      endif; 

                      ?>
                      <div class="col-lg-5 col-md-5 col-sm-5">
                          <div class="col-lg-4 col-md-4 col-sm-4">
                              <h4><?php echo $key['Bac']['title']; ?></h4>
                              <p class="discret">Bac n° <?php echo $key['Bac']['id']; ?></p>
                          </div>
                          <div class="col-lg-2 col-lg-offset-5 col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-5">
                                  <a href="<?= $this->Html->url(array('controller' => 'bacs', 'action' => 'edit', $key['Bac']['id']), true); ?>" ><span class="glyphicon glyphicon-pencil icone"></span></a>
                                  <a href="#"><span class="glyphicon glyphicon-remove icone"></span></a>
                          </div>    
                              
                              
                              <textarea class="form-control" rows="5" id="commentaires"><?php echo $key['Bac']['description']; ?></textarea>
                              <p class="icone">
                              
                                  <a href="<?= $this->Html->url(array('controller' => 'bacs', 'action' => 'edit',$key['Bac']['id']) );?>"><span class="glyphicon glyphicon-pencil icone"></span>Modifier la description</a>
                                  <a href="#"><span class="glyphicon glyphicon-remove icone"></span>Supprimer la description</a>
                              </p>
                      </div>
                      <div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 barre_select">
                          <p class="text-right barre_select">
                            <div class="checkbac">
                            <?= $this->Form->input($key['Bac']['id'], array('type' => 'checkbox', 'label' => 'Choisir'));?>    
                            <span class='text'>✔</span>
                            </div>     
                          </p>          
                      </div>
              </div>    
          </div>
          <hr>
          <!-- FIN ITEM -->

    <tr>

    	<td>

      </td>

    </tr>
  <?php 
  endforeach;
  // Fin foreach

  ?>
  <p class="text-right">
<button type"submit" class="btn btn-sm btn-primary" style="background-color:#65b7f2;color:white">Récupérer les bacs selectionnés</button>
</p>

<?= $this->Form->end(); ?>
      <!-- FIN LISTE BAC -->
      </div>
  

      <!-- FIN CONTENT -->
</div>   
    
<?php
// Fin du if
}


// Sinon on le notifie qu'il n'a aucun bac
else {
?>

	<div class="container-fluid row bandeau">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h2 class="text-center">Vous n'avez aucun bac</h1>
        </div>
    </div>

<?php
}
?>