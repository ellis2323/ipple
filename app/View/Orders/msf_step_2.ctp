<?php
echo $this->Form->create('Order');

echo $this->Form->input('street');
echo $this->Html->link('Previous step', 
	array('action' => 'msf_step', $params['currentStep'] -1), 
	array('class' => 'button')
);
echo $this->Form->end('Next step');
?>