<?php
echo $this->Form->create('Order');
echo $this->Form->input('Address.concierge_deposit');
echo $this->Form->input('Address.date_deposit');
echo $this->Form->input('Address.date_withdrawal');
echo $this->Html->link('Previous step',
	array('action' => 'msf_step', $params['currentStep'] -1),
	array('class' => 'button')
);
echo $this->Form->end('Save');
?>