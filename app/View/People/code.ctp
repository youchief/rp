<div class="editions form">
<?php echo $this->Form->create('Edition'); ?>
	<fieldset>
		<legend><?php echo __('Entrez votre code'); ?></legend>
	<?php
		echo $this->Form->input('code', array('class'=>'form-control', 'after'=>'Ce code se trouve dans votre dernier Bella vita page 2'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Envoyer'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
