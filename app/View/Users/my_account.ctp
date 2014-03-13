<?= $this->start('tabs'); ?>
<script type='text/javascript'>
$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });
});
</script>
<?= $this->end(); ?>


<div class="container-fluid">
    <div class="section">
    <h3 class="text-center bandeau">Mon compte</h3>
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
            
                
            <ul id="matabs" class="nav nav-tabs">
              
              <li class="active"><a href="#profil" data-toggle="tab">Mon profil</a></li>
              <li class=""><a href="#factures" data-toggle="tab">Mes factures</a></li>
              <li class=""><a href="#parrain" data-toggle="tab">Mes parrainages</a></li>
              <li class=""><a href="#password" data-toggle="tab">Mon mot de passe</a></li> 
              <li class=""><a href="#bancaire" data-toggle="tab">Mes coordonnées bancaires</a></li>
              <li><a href="#livraisons" data-toggle="tab">Mes livraisons</a></li>
            </ul>
            
            <!-- Tab Content -->
            <div id="matab" class="tab-content">


                <!-- Profil -->
                <div class="tab-pane fade active in" id="profil">
                    <?php 
                    // Infos utilisateur
                    if(!empty($user)):
                        ?>
                        
                        Nom: <?= $user['User']['lastname'];?><br />
                        Prénom: <?= $user['User']['firstname'];?><br />
                        Email: <?= $user['User']['email'];?><br />

                        Date de création du compte : <?= $user['User']['created'];?><br />

                    <?php
                    endif;
                    ?>

                    <?php 
                    // Adresse de l'utilisateur
                    if(!empty($address)):
                        ?>
                        
                        Nom: <?= $user['User']['lastname'];?><br />
                        Prénom: <?= $user['User']['firstname'];?><br />
                        Email: <?= $user['User']['email'];?><br />

                        Date de création du compte : <?= $user['User']['created'];?><br />

                    <?php
                    endif;
                    ?>                    
                </div>
                <!-- /Profil -->
                
                <!-- Factures -->
                <div class="tab-pane fade" id="factures">
                    <div class="table-responsive">
                        <br>
                        <table class="table table-striped">
                        
                            <tbody><tr>
                                <th>Numéro de facture</th>
                                <th>Date de facture</th>
                                <th>Téléchargement</th>
                            </tr>
                            <tr class="text-center">
                                <td>123145</td>
                                <td>05/01/2014</td>
                                <td><a href="#">Télécharger</a></td>
                            </tr>
                        </tbody></table>
                    </div>                        
                </div>
                <!-- /Factures -->

                <!-- Parrain -->
                <div class="tab-pane fade" id="parrain">
                </div>
                <!-- /Parrain -->

                <!-- Password -->
                <div class="tab-pane fade" id="password">
                    <?= $this->Form->create('User', array('class' => 'form-horizontal' )); ?>
                        <div class="section">
                            <br><br>

                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <h3 class="text-center">Voulez-vous changer votre mot de passe?</h3><br>


                                <div class="form-group">
                                <?php
                                echo $this->Form->label('old_password', 'Mot de passe actuel<span class="blue">*</span>', array(
                                                                                'class' => 'col-lg-6 col-md-6 col-sm-6 control-label',
                                                                                'style' => 'text-align:right;',
                                                                            )
                                );
                                ?>
                                <?= $this->Form->input('old_password', array(
                                    'type'  => 'password',
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre ancien mot de passe',
                                    'div'           => 'col-lg-6 col-md-6 col-sm-6',

                                    )); ?>                                

                                </div>

                                <div class="form-group">
                                <?php
                                echo $this->Form->label('password', 'Nouveau mot de passe<span class="blue">*</span>', array(
                                                                                'class' => 'col-lg-6 col-md-6 col-sm-6 control-label',
                                                                                'style' => 'text-align:right;',
                                                                            )
                                );
                                ?>
                                <?= $this->Form->input('password', array(
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre nouveau mot de passe',
                                    'div'           => 'col-lg-6 col-md-6 col-sm-6',

                                    )); ?>                                

                                </div>
                        
                            
                                <div class="form-group">
                                <?php
                                echo $this->Form->label('password2', 'Confirmer le nouveau mot de passe<span class="blue">*</span>', array(
                                                                                'class' => 'col-lg-6 col-md-6 col-sm-6 control-label',
                                                                                'style' => 'text-align:right;',
                                                                            )
                                );
                                ?>
                                <?= $this->Form->input('password2', array(
                                    'type'  => 'password',
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'placeholder' => 'Confirmer votre nouveau mot de passe',
                                    'div'           => 'col-lg-6 col-md-6 col-sm-6',

                                    )); ?>                                

                                </div>
                            
                                <div class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6">
                                        <p><button class="btn  btn-md btn-primary btn-block" style="background-color:#65b7f2;color:white">Changer mon mot de passe</button></p>
                                        
                                        <p><span class="blue">*</span> Champs obligatoires</p>
                                </div>

                                <br>
                            </div>                           
                            
                        </div>
                    <?= $this->Form->end(); ?>
               </div>
                <!-- /Password -->

                <!-- Bancaire -->
                <div class="tab-pane fade" id="bancaire">
                    <form class="form-horizontal" role="form">
                        <div class="section">
                            <br><br>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="nom" class="col-lg-4 col-md-4 col-sm-4 control-label">Nom<span class="blue">*</span></label>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input required="" class="form-control" id="nom" placeholder="Votre nom" type="text">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="prenom" class="col-lg-4 col-md-4 col-sm-4 control-label">Prénom<span class="blue">*</span></label>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input required="" class="form-control" id="prenom" placeholder="Votre prénom" type="text">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="card" class="col-lg-4 col-md-4 col-sm-4 control-label">Numéro de carte<span class="blue">*</span></label>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input required="" class="form-control" id="card" placeholder="Votre nom" type="text">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="validity" class="col-lg-4 col-md-4 col-sm-4 control-label">Date de validité<span class="blue">*</span></label>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input required="" class="form-control" id="validity" placeholder="Votre prénom" type="text">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="ccv" class="col-lg-4 col-md-4 col-sm-4 control-label">CCV<span class="blue">*</span></label>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input required="" class="form-control" id="ccv" placeholder="Votre nom" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4">
                                    <p><button type="submit" class="btn  btn-md btn-primary btn-block" style="background-color:#65b7f2;color:white">Je valide</button></p>
                                    <p><span class="blue">*</span> Champs obligatoires</p>
                                </div>
                                <br>
                            </div>

                            <div class="col-lg-4 col-md-4 cadre2">
                                <p class="text-justify">Vos données ne sont pas stockées par Dézordre mais par Ogone un organisme mmmmmmmm mmmpppppppp ppppppppp ppppppp oooooooo oooooooooooo ooooooo oooooo</p><br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                    <?php echo $this->Html->image('cadenas.png', array('alt' => 'responsive image', 'class' => 'img-responsive taille')); ?>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <p>100% sécurisé</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                    <?php echo $this->Html->image('check.png', array('alt' => 'responsive image', 'class' => 'img-responsive taille')); ?>                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <p>Vérified by Visa, Mastercard</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div> 
                <!-- /Bancaire -->


                <!-- Livraisons -->
                <div class="tab-pane fade" id="livraisons">
                <!-- Si aucune commandes -->
                <?php if(empty($orders_current) && empty($orders_history)){
                ?>
                    <a href="<?= $this->Html->url(array('controller' => 'orders', 'action' => 'step1')); ?>" ><button type"submit" class="btn-lg color-btn" >Prévoir une livraison de bacs vides</button></a>
                <?php 
                }
                ?>


                    <!-- Commande en cours -->
                    <?php if(!empty($orders_current)){?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <caption><h3 class="text-left">Livraison(s) prévues</h3></caption>

                            <tbody>
                                <tr class="bleu_blanc">
                                    <th>#ID</th>
                                    <th>Date</th>
                                    <th>Heure de livraison</th>
                                    <th>Etat de la commande</th>
                                    <th>Nb d'items</th>
                                    <th>Modifier</th>
                                </tr>


                                 <?php 
                                 
                                  for($i=0;$i<count($orders_current);$i++){
                                  // Debut foreach

                                    $date_deposit = $orders_current[$i]['Order']['date_deposit'];

                                    $display_date_deposit = date('d/m/Y', strtotime($date_deposit) );
                                   



                                    $hour_deposit = $orders_current[$i]['Order']['hour_deposit'];
                                    $state_deposit = $orders_current[$i]['Order']['state_deposit'];

                                    $date_withdrawal = $orders_current[$i]['Order']['date_withdrawal'];
                                    $display_date_withdrawal = date('d/m/Y', strtotime($date_withdrawal) );

                                    if($orders_current[$i]['Order']['state_deposit'] == 0){
                                    ?>
                                    
                                    <tr class="text-center">
                                        <td><?php echo $orders_current[$i]['Order']['id']; ?></td>
                                        <td><?php echo $display_date_deposit; ?></td>

                                        <td><?php echo $hours[$hour_deposit]; ?></td>

                                        <td><?php echo $state[$state_deposit]; ?></td>

                                        <td><?php echo $orders_current[$i]['Order']['nb_bacs']; ?></td>

                                        <td class="blue"><a href="<?= $this->Html->url(
                                                    array(
                                                                'controller' => 'orders', 
                                                                'action' => 'edit', $orders_current[$i]['Order']['id']
                                                            )
                                                    , true
                                            ); 
                                        ?>" class="glyphicon glyphicon-pencil">Modifier</a></td>
                                    </tr>

                                  <?php 
                                } // if deposit


                                if($orders_current[$i]['Order']['state_withdrawal'] == 1){
                                    $hour_withdrawal = $orders_current[$i]['Order']['hour_withdrawal'];
                                    $state_withdrawal = $orders_current[$i]['Order']['state_withdrawal'];
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $orders_current[$i]['Order']['id']; ?></td>
                                    <td><?php echo $display_date_withdrawal; ?></td>

                                    <td><?php echo $hours[$hour_withdrawal]; ?></td>

                                    <td><?php echo $state[$state_withdrawal]; ?></td>

                                    <td><?php echo $orders_current[$i]['Order']['nb_bacs']; ?></td>

                                    <td class="blue"><a href="<?= $this->Html->url(
                                                array(
                                                            'controller' => 'orders', 
                                                            'action' => 'edit', $orders_current[$i]['Order']['id']
                                                        )
                                                , true
                                        ); 
                                    ?>" class="glyphicon glyphicon-pencil">Modifier</a></td>
                                </tr>
                                <?php
                                } // if withdrawal
                             } // for
                             ?>

                            </tbody>

                        </table>
                    </div>
                    <?php } // if total orders ?>

                    <!-- Commande passée -->
                    <?php if(!empty($orders_history)){?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <caption><h3 class="text-left">Historique</h3></caption>

                            <tbody>
                                <tr class="bleu_blanc">
                                    <th>#ID</th>
                                    <th>Date</th>
                                    <th>Heure de livraison</th>
                                    <th>Etat de la commande</th>
                                    <th>Nb d'items</th>
                                </tr>


                                 <?php 
                                 
                                  for($i=0;$i<count($orders_history);$i++){
                                  // Debut foreach

                                    $date_deposit = strtotime($orders_history[$i]['Order']['date_deposit']);

                                    $display_date_deposit = date('d/m/Y', $date_deposit);
                                   
                                    $hour_deposit = $orders_history[$i]['Order']['hour_deposit'];
                                    $state_deposit = $orders_history[$i]['Order']['state_deposit'];

                                    $date_withdrawal = $orders_history[$i]['Order']['date_withdrawal'];
                                    $display_date_withdrawal = date('d/m/Y', strtotime($date_withdrawal) );



                                    if($orders_current[$i]['Order']['state_deposit'] == 1){
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $orders_history[$i]['Order']['id']; ?></td>
                                        <td><?php echo $display_date_deposit; ?></td>

                                        <td><?php echo $hours[$hour_deposit]; ?></td>

                                        <td><?php echo $state[$state_deposit]; ?></td>

                                        <td><?php echo $orders_history[$i]['Order']['nb_bacs']; ?></td>

                                    </tr>

                                  <?php 
                                    }
                                     if($orders_current[$i]['Order']['state_withdrawal'] > 1){
                                            $hour_withdrawal = $orders_history[$i]['Order']['hour_withdrawal'];
                                            $state_withdrawal = $orders_history[$i]['Order']['state_withdrawal'];
                                        ?>
                                        <tr class="text-center">
                                            <td><?php echo $orders_history[$i]['Order']['id']; ?></td>
                                            <td><?php echo $display_date_withdrawal; ?></td>

                                            <td><?php echo $hours[$hour_withdrawal]; ?></td>

                                            <td><?php echo $state[$state_withdrawal]; ?></td>

                                            <td><?php echo $orders_history[$i]['Order']['nb_bacs']; ?></td>


                                        </tr>
                                        <?php
                                        }
                                  }
                                  ?>

                            </tbody>

                        </table>
                    </div>
                    <?php }?>

                </div>
                <!-- /Livraisons -->
             </div> 
             <!-- Tab Content -->


        </div> <!-- Col-lg-10 -->
    <!-- /Section -->
    </div>

<!-- /Container-fluid -->
</div>
