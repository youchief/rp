<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Login'); ?></legend>
	<?php
		echo $this->Form->input('username', array('class'=>'form-control'));
		echo $this->Form->input('password', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Connect'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
