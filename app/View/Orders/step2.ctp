<?= $this->Html->css('latoja.datepicker', array('inline' => false)); ?>
<?= $this->Html->script('search_ajax', array('inline' => false)); ?>
<div class="container-fluid">
<?=
$this->Form->create('Address', array(
        'class' => 'horizontal-form',
    )
);  ?>

<div class="row bandeau">
    <h2 class="text-center">Commander des bacs</h2>
</div>
<br>

<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
<div class="section">

<div class="row">
    <h3><?php echo $this->Html->image('fleche_liv.png', array('alt' => 'responsive image')); ?> Où voulez-vous vous
        faire livrer les bacs?</h3>
</div>

<div class="choix">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">

    <div class="form-group">
        <?php
        echo $this->Form->label('lastname', 'Nom <span class="blue">*</span>', array(
                'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                'style' => 'text-align:right;',

            )
        );
        ?>
        <?php
        echo $this->Form->input('lastname', array(
                'type' => 'text',
                'label' => false,
                'class' => 'form-control',
                'required' => true,
                'div' => 'col-lg-6 col-md-6 col-sm-6',
                'value' => $data_user['0']['lastname'],

            )
        );?>

    </div>
    <p><br></p>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">

    <div class="form-group">
        <?php
        echo $this->Form->label('firstname', 'Prénom <span class="blue">*</span>', array(
                'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                'style' => 'text-align:right;',
            )
        );
        ?>
        <?php
        echo $this->Form->input('firstname', array(
                'type' => 'text',
                'label' => false,
                'class' => 'form-control',
                'required' => true,
                'div' => 'col-lg-6 col-md-6 col-sm-6',
                'value' => $data_user['0']['firstname'],

            )
        );?>
    </div>
    <p><br></p>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">

        <?php
        echo $this->Form->label('company', 'Entreprise', array(
                'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                'style' => 'text-align:right;',
            )
        );
        ?>
        <?php
        echo $this->Form->input('company', array(
                'type' => 'text',
                'label' => false,
                'class' => 'form-control',
                'div' => 'col-lg-6 col-md-6 col-sm-6',
                'value' => $data_user['0']['company'],

            )
        );?>
    </div>
    <p><br></p>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">

        <?php
        echo $this->Form->label('phone', 'Téléphone <span class="blue">*</span>', array(
                'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                'style' => 'text-align:right;',
            )
        );
        ?>
        <?php
        echo $this->Form->input('phone', array(
                'type' => 'text',
                'label' => false,
                'class' => 'form-control',
                'required' => true,
                'div' => 'col-lg-6 col-md-6 col-sm-6',
                'value' => $data_user['0']['phone'],

            )
        );?>
    </div>
    <p><br></p>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">

    <div class="form-group">

        <?php
        echo $this->Form->label('street', 'Adresse <span class="blue">*</span>', array(
                'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                'style' => 'text-align:right;',
            )
        );
        ?>
        <?php
        echo $this->Form->input('street', array(
                'type' => 'textarea',
                'label' => false,
                'class' => 'form-control',
                'required' => true,
                'div' => 'col-lg-6 col-md-6 col-sm-6',
                'style' => 'height:120px;',
                'value' => $data_user['0']['street'],
            )
        );?>
    </div>
    <p><br></p>
</div>


<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
        <?php
        echo $this->Form->label('postals', 'Code postal <span class="blue">*</span>', array(
                'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                'style' => 'text-align:right;',

            )
        );
        ?>

        <?php
        echo $this->Form->input('postals', array(
                'label' => false,
                'class' => 'form-control',
                'required' => true,
                'div' => 'col-lg-6 col-md-6 col-sm-6',
                'empty' => '(choisissez)',
                'default' => $data_user['0']['postal_id'],

            )
        );?>

        <div id="return"></div>
    </div>
    <p><br></p>
</div>


<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
        <?php
        echo $this->Form->label('floor', 'Etage <span class="blue">*</span>', array(
                'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                'style' => 'text-align:right;',
            )
        );
        ?>
        <?php
        echo $this->Form->input('floor', array(
                'type' => 'text',
                'label' => false,
                'class' => 'form-control',
                'div' => 'col-lg-6 col-md-6 col-sm-6',
                'value' => $data_user['0']['floor'],
            )
        );?>
    </div>
    <p><br></p>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
        <?php
        echo $this->Form->label('digicode', 'Digicode', array(
                'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                'style' => 'text-align:right;',
            )
        );
        ?>
        <?php
        echo $this->Form->input('digicode', array(
                'type' => 'text',
                'label' => false,
                'class' => 'form-control',
                'div' => 'col-lg-6 col-md-6 col-sm-6',
                'value' => $data_user['0']['digicode'],
            )
        );?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <?php
            echo $this->Form->label('comment', 'Commentaires', array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2 control-label',
                    'style' => 'text-align:right;',
                )
            );
            ?>

            <?php
            echo $this->Form->input('comment', array(
                    'type' => 'textarea',
                    'label' => false,
                    'class' => 'form-control',
                    'div' => 'col-lg-9 col-md-9 col-sm-9',
                    'placeholder' => ' Facilitez votre livraison en nous indiquant votre digicode, etc...',
                    'value' => $data_user['0']['comment'],
                )
            );?>
        </div>
    </div>
</div>
</div>

<div class="row">
    <!-- HEURE ET DATE -->
    <h3><?php echo $this->Html->image('fleche_recup.png', array('alt' => 'responsive image')); ?> Quand voulez-vous
        faire livrer les bacs chez vous?</h3>


    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
            <?php
            echo $this->Form->label("Order.select_date", 'Date de livraison<span class="blue">*</span>', array(
                    'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                    'style' => 'text-align:right;',

                )
            );
            ?>

            <!-- DATEPICKER -->
            <?=
            $this->Form->input("Order.date_deposit",
                array(
                    'label' => false,
                    'type' => 'text',
                    'id' => 'OrderSelectDate',
                    'class' => 'form-control',
                    'div' => 'col-lg-6 col-md-6 col-sm-6',
                    'required' => true,
                    'default' => $date_deposit,

                )
            ); ?>
            <div id="datepicker"></div>

            <?= $this->start('datepicker'); ?>


            <script type='text/javascript'>
                $(document).ready(function () {
                    var datesBlocked = ["2014-03-14", "2014-03-15", "2014-03-16"];
                    date_deposit = "<?= $date_deposit; ?>";
                    date_deposit = date_deposit.split('-');

                    new_date = date_deposit[2]+'-'+date_deposit[1]+'-'+date_deposit[0];
                    new_date = Date.parse(new_date);

                    // date de dépot
                    new_date = date_deposit + <?= $min_date; ?>;
                    new_date = new Date(new_date);


                    $("#OrderSelectDate").click(function () {
                        $("#datepicker").datepicker(
                            {
                                dateFormat: 'dd-mm-yy',
                                minDate: '+1d',
                                defaultDate: $("#OrderSelectDate").val(),
                                monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                                beforeShowDay: function (date) {
                                    var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                    return [ datesBlocked.indexOf(string) == -1 ];
                                },
                                onSelect: function (dateText, inst) {
                                    $('#OrderSelectDate').val(dateText);
                                    $("#datepicker").datepicker("destroy");
                                }
                            });
                    });
                });
            </script>


            <?= $this->end(); ?>

            <!-- /DATEPICKER -->


            <div class="checkbox">
                <?php
                echo $this->Form->label('Order.concierge_deposit', 'Concierge? Oui, laissez les bacs à mon concierge', array(
                        'class' => 'col-lg-6 col-md-6 col-sm-6',
                    )
                );
                ?>
                <?php
                echo $this->Form->input('Order.concierge_deposit', array(
                    'label' => false,
                    'type' => 'checkbox',

                ));
                ?>
            </div>


        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
            <?php
            echo $this->Form->label('Order.hdeposits', 'Heure de livraison<span class="blue">*</span>', array(
                    'class' => 'col-lg-4 col-md-4 col-sm-4 control-label',
                    'style' => 'text-align:right;',
                )
            );


            echo $this->Form->input('Order.hdeposits', array(
                'class' => 'form-control',
                'label' => false,
                'div' => 'col-lg-6 col-md-6 col-sm-6',
            ));?>
        </div>
    </div>


    <div class='col-lg-3 col-md-3 col-sm-3 col-lg-offset-4 col-md-offset-4 col-sm-offset-4' style='text-align:center;'>


        <button type="submit" class="btn" style="background-color:#65b7f2;color:white;">Prochaine étape (3/3)</button>


        <div class="col-lg-12 col-md-12 col-sm-12">
            <p><span class="blue">*</span> Champs obligatoires</p>
        </div>
    </div>





    <?= $this->end(); ?>
</div>

</div>
<!-- /choix -->

</div>
<!-- /section -->


</div>
<!-- / container centré -->

<?= $this->Form->end(); ?>
</div> <!-- /container-fluid -->