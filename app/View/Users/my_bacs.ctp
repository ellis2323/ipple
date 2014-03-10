<?php
// Si l'utilisateur à des bacs
if(!empty($bacs)){
// If

?>


<div class="section">
    <h3 class="text-center">Mes affaires</h3>
        
    <ul id="matab" class="nav nav-tabs">
      
      <li class="active"><a href="#bacstock" data-toggle="tab">Bacs stockés</a></li>
      <li class=""><a href="#bachome" data-toggle="tab">Bacs chez moi</a></li> 
    </ul>
    <p class="text-right"><br><a class="btn btn-sm btn-primary" href="#" role="button" text-right="" style="background-color:#65b7f2;color:white">Récupérer tous mes bacs</a></p>
    <div id="matab" class="tab-content">
    <!-- DEBUT CONTENT -->


        <!-- DEBUT LISTE BACS-->
        <div class="tab-pane fade active in" id="bacstock">
<?= $this->Form->create('Order'); ?>
 <?php 
  foreach($bacs as $key):
  // Debut foreach

    ?>
        <!-- DEBUT ITEM -->
          <div class="un_bac"> 
              <div class="row">
                    
                      <?php 
                      if(!empty($key['Media'])): 
                      ?>

                            <?= $this->Html->image($key['Bac']['thumb'], array('width' => '250', 'height' => '250', 'class' => 'col-lg-3 col-md-3 col-sm-3 ' ) ); ?>




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
                          <p class="text-right barre_select"><a class="btn btn-sm  btn-primary" href="#" role="button" text-right="" style="background-color:#65b7f2;color:white">Récupérer ce bac</a></p>
                          <?= $this->Form->input($key['Bac']['id'], array('type' => 'checkbox'));?>                   
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
<?= $this->Form->end('Récupérer'); ?>


      <!-- FIN LISTE BAC -->
      </div>
  
      <!-- RECUPERER BACS -->
      <div class="tab-pane fade" id="bachome">


      <form class="form-horizontal" role="form">
          <div class="section">
  
                  <div class="row">
                      
                          <h3><img src="fleche_liv.png" class="img-responsive pull-left" alt="responsive image" style="margin:0 1%"></h3>   
                          <h3>Où voulez-vous vous faire livrer les bacs?</h3>
                  </div>
                  <div class="choix">    
                  
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="nom" class="col-lg-4 col-md-4 col-sm-4 control-label">Nom<span class="blue">*</span></label>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <input required="" class="form-control" id="nom" placeholder="Votre nom" type="text">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="prenom" class="col-lg-4 col-md-4 col-sm-4 control-label">Prénom<span class="blue">*</span></label>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <input required="" class="form-control" id="prenom" placeholder="Votre prénom" type="text">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="entreprise" class="col-lg-4 col-md-4 col-sm-4 control-label">Entreprise</label>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                              <input class="form-control" id="entreprise" placeholder="Votre entreprise" type="text">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="telephone" class="col-lg-4 col-md-4 col-sm-4 control-label">Téléphone<span class="blue">*</span></label>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <input required="" class="form-control" id="telephone" placeholder="Votre téléphone" type="tel">
                              </div>
                          </div>
                      </div>
                      
                          <div class="form-group">
                              <label for="adresse" class="col-lg-2 col-md-2 col-sm-2 control-label">Adresse<span class="blue">*</span></label>
                              <div class="col-lg-6 col-md-6 col-sm-6" style="margin:0 10px">
                                  <input required="" class="form-control" id="adresse" placeholder="Votre adresse" type="text">
                              </div>
                          </div>
                      
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="code_postal" class="col-lg-4 col-md-4 col-sm-4 control-label">Code Postal<span class="blue">*</span></label>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <input required="" class="form-control" id="code_postal" placeholder="Votre code postal" type="text">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="ville" class="col-lg-4 col-md-4 col-sm-4 control-label">Ville<span class="blue">*</span></label>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <input required="" class="form-control" id="ville" placeholder="Paris" type="text">
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="commentaires" class="col-lg-2 col-md-2 col-sm-2 control-label">Commentaires pour<br> la livraison</label>
                          <div class="col-lg-6 col-md-6 col-sm-6" style="margin:0 10px">
                              <textarea class="form-control" rows="3" id="commentaires"></textarea>
                              <p><span class="blue">*</span> Champs obligatoires</p>
                          </div>
                      </div>
                  
                  
                  </div><!-- choix -->

              </div> <!--section -->
      </form> 

      <!-- FIN RECUPERER BAC -->
      </div>

      <!-- FIN CONTENT -->
  </div>
</div>   
    
<?php
// Fin du if
}


// Sinon on le notifie qu'il n'a aucun bac
else {
?>

<h1>Vous n'avez aucun bac</h1>

<?php
}
?>