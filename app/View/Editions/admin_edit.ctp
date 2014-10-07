<div class="editions form">
<?php echo $this->Form->create('Edition'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Edition'); ?></legend>
	<?php
		echo $this->Form->input('id', array('class'=>'form-control'));
		echo $this->Form->input('date', array('class'=>'form-control'));
		echo $this->Form->input('name', array('class'=>'form-control'));
                echo $this->Form->input('active', array('class'=>'form-control'));
		echo $this->Form->input('code', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
