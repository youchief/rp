<div class="editions form">
<?php echo $this->Form->create('Edition'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('code', array('class'=>'form-control', 'label'=>'Code (voir en page 2 de votre dernier <i>Bella vita</i>)'));
	?>
	</fieldset>
        <br>
<?php echo $this->Form->submit(__('Continuer'), array('class'=>'btn btn-rp')); ?>
<?php echo $this->Form->end(); ?>
</div>
