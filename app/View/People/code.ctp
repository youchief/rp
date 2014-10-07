<div class="editions form">
<?php echo $this->Form->create('Edition'); ?>
	<fieldset>
		<legend><?php echo __('Entrez votre code'); ?></legend>
	<?php
		echo $this->Form->input('code', array('class'=>'form-control', 'after'=>'Ce code ce trouve dans votre dernier magazine Bella Vita'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
