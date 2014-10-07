<div class="people form">
<?php echo $this->Form->create('Person'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Person'); ?></legend>
	<?php
		echo $this->Form->input('firstname', array('class'=>'form-control'));
		echo $this->Form->input('lastname', array('class'=>'form-control'));
		echo $this->Form->input('address', array('class'=>'form-control'));
		echo $this->Form->input('zip', array('class'=>'form-control'));
		echo $this->Form->input('city', array('class'=>'form-control'));
		echo $this->Form->input('email', array('class'=>'form-control'));
		echo $this->Form->input('winner', array('class'=>'checkbox'));
		echo $this->Form->input('coupon_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
