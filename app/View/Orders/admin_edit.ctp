<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('Order.user_id');
		echo $this->Form->input('nb_bacs');
		echo $this->Form->input('state');
		echo $this->Form->input('date_deposit', array('type'=>'date'));
		echo $this->Form->input('date_withdrawal', array('type'=>'date'));


	?>


    <!-- DATEPICKER  deposit-->
    <?= $this->Form->input("date_deposit", 
        array(
            'label' => false, 
            'type' => 'text',
            'id' => 'select_date',
            'class' => 'form-control',
            'div' => 'col-lg-6 col-md-6 col-sm-6',
            'required' => false,

        )
    ); ?>
    <div id="datepicker"></div>

        <?= $this->start('datepicker'); ?>


        <script type='text/javascript'>
         $(document).ready(function(){
                    var datesBlocked = ["2014-03-14","2014-03-15","2014-03-16"];

                      $("#select_date").click(function(){
                             $("#datepicker").datepicker(
                            {
                                   dateFormat: 'mm/dd/yy',
                                   minDate : 0,
                                   monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                                   beforeShowDay: function(date){
                                        var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                        return [ datesBlocked.indexOf(string) == -1 ];
                                    },
                                   onSelect: function(dateText, inst){
                                         $('#select_date').val(dateText);
                                         $("#datepicker").datepicker("destroy");
                                  }
                             });
                       });
                });
         </script>

         
         <?= $this->end(); ?> 

         <!-- /DATEPICKER deposit --> 


    <!-- DATEPICKER  withdraw -->
    <?= $this->Form->input("date_withdrawal", 
        array(
            'label' => false, 
            'type' => 'text',
            'id' => 'select_date',
            'class' => 'form-control',
            'div' => 'col-lg-6 col-md-6 col-sm-6',
            'required' => false,

        )
    ); ?>
    <div id="datepicker2"></div>

        <?= $this->start('datepicker2'); ?>


        <script type='text/javascript'>
         $(document).ready(function(){
                    var datesBlocked = ["2014-03-14","2014-03-15","2014-03-16"];

                      $("#select_date2").click(function(){
                             $("#datepicker2").datepicker(
                            {
                                   dateFormat: 'mm/dd/yy',
                                   minDate : 0,
                                   monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                                   beforeShowDay: function(date){
                                        var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                                        return [ datesBlocked.indexOf(string) == -1 ];
                                    },
                                   onSelect: function(dateText, inst){
                                         $('#select_date2').val(dateText);
                                         $("#datepicker2").datepicker("destroy");
                                  }
                             });
                       });
                });
         </script>

         
         <?= $this->end(); ?> 

         <!-- /DATEPICKER withdraw --> 

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Order.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Order.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Deliveries'), array('controller' => 'deliveries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deliveries'), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
	</ul>
</div>
