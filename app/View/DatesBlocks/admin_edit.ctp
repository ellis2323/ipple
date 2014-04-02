<div class="datesBlocks form">
<?php echo $this->Form->create('DatesBlock'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Dates Block'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('value',array('label' => 'Valeur à bloquer :','type' => 'number'));
		echo $this->Form->input('type', array('label' => 'Type (1=Jour numérique/2=jour de la semaine/3=semaine/4=mois) :','type' => 'number'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DatesBlock.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DatesBlock.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dates Blocks'), array('action' => 'index')); ?></li>
	</ul>
</div>
