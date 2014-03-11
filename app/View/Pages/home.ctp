<!-- BACKGROUND IMAGE TOP  -->
    <div class="image_de_fond">

<?php 
$user=$this->Session->read('Auth.User');


if(!empty($user)){ 
    ?>
        <div class="container-fluid">
            <div class="row section">
                <p><br></p>
                <a href="<?= $this->Html->url(array('controller' => 'users', 'action' => 'my_bacs'));?>">
                <button type"submit"="" class="btn-lg" style="background-color:#65b7f2;color:white">Mes affaires en stock</button>
                </a>

                <p><br></p>

                <a href="<?= $this->Html->url(array('controller' => 'orders', 'action' => 'add'));?>">
                <button type"submit"="" class="btn-lg" style="background-color:#65b7f2;color:white">Commander des bacs</button>
                </a>

            </div>
        </div>
    <?php
}

else {
?>
        <div class="container-fluid">
            <div class="logo-wrapper">
                <h2>Besoin d'espace</h2>
                <h3>Faites de la place chez vous</h3>
                <h4>Nous récupérons, stockons et livrons vos affaires à la demande</h4>
                <p>
                <a class="btn btn-lg btn-primary" href="
                <?php echo $this->Html->url(
                                    array(
                                        'controller' => 'users',
                                        'action' => 'register',
                                        'full_base'     => true,
                                        'admin'         => false));?>
                " role="button" style="background-color:#65b7f2;color:white">Je démarre</a></p>
            </div>
        </div>
<?php
}
?> 
    </div>

<!-- BACKGROUND IMAGE TOP  -->

<?php
// si l'utilisateur est loggé, on cache le reste de la page
if(empty($user)){ 
?>
<div class="container-fluid">
<!-- DEBUT SECTION 1-->
        <div class="section">
            <h2 id="comment" class="text-center">Comment ça marche?</h2><br>
            <div clas="col-lg-9 col-lg-offset-1">
            <div class="row">
                    <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-4">
                        
                            <?php echo $this->Html->image('un.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                        
                    </div>
                    <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-4">
                        
                            <?php echo $this->Html->image('deux.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                        
                    </div>
                    <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-4">
                        
                            <?php echo $this->Html->image('trois.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>

                    </div>
            </div><!-- /.row -->
            </div>

        </div><!-- /.section -->
        

    </div><!-- /.container -->
<!-- FIN SECTION 1-->
        

<!-- SECTION 2-->
    <div class="section-colored ">

        <div class="container-fluid">

            <div class="col-lg-5 col-md-6 col-sm-6 text-center">
                <?php echo $this->Html->image('mac.png', array('alt' => 'responsive image', 'class' => 'img-responsive mac')); ?>

            </div>    
            <div class="col-lg-7 col-md-6 col-sm-6">      
                <div class="cadre">    
                    <h3 style="color:#65b7f2">Besoin de récupérer quelque chose?</h3>
                    <h4>Gérer vos bacs en ligne.<br>
                        Récupérez tout ou partie de vos bacs dès le lendemain.</h4>     
                </div>        
                    <h3>Intéressé(e) mais pas encore prêt(e)</h3>
                    <h4>Entrez votre email pour recevoir des offres</h4>



<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
    /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="http://cgc-prod.us3.list-manage.com/subscribe/post?u=5649b53c5a08f45620fd5e012&amp;id=6ceebc8478" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
<div class="mc-field-group">
    <label for="mce-EMAIL">Votre email </span>
</label>
    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
    <div id="mce-responses" class="clear">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_5649b53c5a08f45620fd5e012_6ceebc8478" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
</form>
</div>
<script type="text/javascript">
var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == 'complete') mce_preload_check();
        }    
    }
}

var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
}
var head= document.getElementsByTagName('head')[0];
var style= document.createElement('style');
style.type= 'text/css';
if (style.styleSheet) {
  style.styleSheet.cssText = err_style;
} else {
  style.appendChild(document.createTextNode(err_style));
}
head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
    head.appendChild(script);
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    jQuery(document).ready( function($) {
      var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: 'http://cgc-prod.us3.list-manage1.com/subscribe/post-json?u=5649b53c5a08f45620fd5e012&id=6ceebc8478&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $('#mce_tmp_error_msg').remove();
                        $('.datefield','#mc_embed_signup').each(
                            function(){
                                var txt = 'filled';
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        var bday = false;
                                        if (fields.length == 2){
                                            bday = true;
                                            fields[2] = {'value':1970};//trick birthdays into having years
                                        }
                                        if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                            this.value = '';
                                        } else if ( fields[0].value=='' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                            this.value = '';
                                        } else {
                                            if (/\[day\]/.test(fields[0].name)){
                                                this.value = fields[1].value+'/'+fields[0].value+'/'+fields[2].value;                                           
                                            } else {
                                                this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
                                            }
                                        }
                                    });
                            });
                        $('.phonefield-us','#mc_embed_signup').each(
                            function(){
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        if ( fields[0].value.length != 3 || fields[1].value.length!=3 || fields[2].value.length!=4 ){
                                            this.value = '';
                                        } else {
                                            this.value = 'filled';
                                        }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $('#mc-embedded-subscribe-form').ajaxForm(options);
      /*
 * Translated default messages for the jQuery validation plugin.
 * Locale: FR
 */
jQuery.extend(jQuery.validator.messages, {
        required: "Ce champ est requis.",
        remote: "Veuillez remplir ce champ pour continuer.",
        email: "Veuillez entrer une adresse email valide.",
        url: "Veuillez entrer une URL valide.",
        date: "Veuillez entrer une date valide.",
        dateISO: "Veuillez entrer une date valide (ISO).",
        number: "Veuillez entrer un nombre valide.",
        digits: "Veuillez entrer (seulement) une valeur numérique.",
        creditcard: "Veuillez entrer un numéro de carte de crédit valide.",
        equalTo: "Veuillez entrer une nouvelle fois la même valeur.",
        accept: "Veuillez entrer une valeur avec une extension valide.",
        maxlength: jQuery.validator.format("Veuillez ne pas entrer plus de {0} caractères."),
        minlength: jQuery.validator.format("Veuillez entrer au moins {0} caractères."),
        rangelength: jQuery.validator.format("Veuillez entrer entre {0} et {1} caractères."),
        range: jQuery.validator.format("Veuillez entrer une valeur entre {0} et {1}."),
        max: jQuery.validator.format("Veuillez entrer une valeur inférieure ou égale à {0}."),
        min: jQuery.validator.format("Veuillez entrer une valeur supérieure ou égale à {0}.")
});
      
    });
}
function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
        });
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';
                
                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
}

</script>
<!--End mc_embed_signup-->
                    
                      
            </div>   

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section-colored -->
<!-- FIN SECTION 2 -->


<!-- SECTION 3 -->
    <div class="section">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 text-center">
                    
                    <h2 id="prix">Combien ça coûte?</h2>
                    <hr>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <?php echo $this->Html->image('contenu_bac.png', array('alt' => 'responsive image', 'class' => 'img-responsive img-home-portfolio')); ?>

                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">

                    <?php echo $this->Html->image('bac_dim.png', array('alt' => 'responsive image', 'class' => 'img-responsive img-home-portfolio')); ?>
                    
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 cadre2">
                    <h3 style="background-color:#65b7f2;text-align:center;color:white;padding:2%">6,25€ par bac/mois</h3>
                    <ul>
                        <li style="color:#898989"> 4 bacs minimum</li>
                        <li style="color:#898989"> 3 mois minimum</li>
                        <li style="color:#898989"> livraisons des bacs vides gratuites</li>
                        <li style="color:#898989"> Récupérations des bacs pleins chez vous gratuites</li>
                        <li style="color:#898989"> Récupérations de vos bacs en stock : 20€+2€/bac</li>
                    </ul>
                    <p style="text-align:center"><a class="btn btn-lg" style="background-color:#65b7f2;color:white" href="<?php echo $this->Html->url(
                                    array(
                                        'controller' => 'users',
                                        'action' => 'register',
                                        'full_base'     => true,
                                        'admin'         => false                                    )
                                );?>" role="button">Je démarre</a></p>
                    
                
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section -->
<!-- FIN SECTION 3 -->



<!-- SECTION 4 -->
    <div class="section couleurfond">
        <h2 id="securite" class="text-center">Sécurité</h2>
        <hr>
        <div class="container" style="color:#898989">

            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                    <?php echo $this->Html->image('camera.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>

                </div>
                <div class="col-lg-7 col-md-7">
                    <h4>Vos bacs sont stockés dans un entrepôt sécurisé et monitoré 24h/24</h4>
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                    <?php echo $this->Html->image('cadenas.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                </div>
                <div class="col-lg-7 col-md-7">
                    <h4>Nous vous fournissons des scellés à usage unique pour fermer vos bacs</h4>
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <div class="row">
                <div class="col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-2">
                    <?php echo $this->Html->image('ordi.png', array('alt' => 'responsive image', 'class' => 'img-responsive')); ?>
                </div>
                <div class="col-lg-7 col-md-7">
                    <h4>Avec l'inventaire en ligne vous êtes toujours au courant de ce que vous avez stocké</h4>

                </div>
            </div>
            <!-- /.row -->

        </div>
    <!-- /.container -->
        

    </div>
    <!-- /.section -->

<!-- FIN SECTION 4 -->
<?php
}
?>