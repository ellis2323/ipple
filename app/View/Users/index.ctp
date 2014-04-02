<?= $this->Html->css('jquery-ui-1.10.4.custom.min', array('inline' => false)); ?>

<?= $this->Html->script('jquery-1.10.2'); ?>


        <?= $this->Form->create(false); ?>
        <?= $this->Form->input("date", 
            array(
            'label' => "Date : ", 
            'type' => 'text',
            'error' => false , 
            'id' => 'select_date'
            )
        ); ?>
        <div id="datepicker"></div>
        <?= $this->Form->end(); ?>

