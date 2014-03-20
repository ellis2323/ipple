<?php
echo $this->Form->create('Order');
echo $this->Form->input('nb_bacs');
echo $this->Form->input('Address.0.postal');
echo $this->Form->input('date_deposit');
echo $this->Form->input('date_withdrawal');
echo $this->Form->end('Next step');
?>