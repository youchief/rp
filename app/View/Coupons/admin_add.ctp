<div class="coupons form">
<?php echo $this->Form->create('Coupon', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Coupon'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class'=>'form-control'));
                echo $this->Form->input('short_description', array('class'=>'form-control'));
                echo $this->Form->input('date_place_condition', array('class'=>'form-control'));
		echo $this->Form->input('description', array('class'=>'form-control'));
                echo $this->Form->input('website', array('class'=>'form-control'));
		echo $this->Form->input('nb_available', array('class'=>'form-control'));
                echo $this->Form->input('active', array('class'=>'checkbox'));
		echo $this->Form->input('img_1', array('class'=>'form-control','type'=>'file'));
		echo $this->Form->input('img_2', array('class'=>'form-control', 'type'=>'file'));
		echo $this->Form->input('img_3', array('class'=>'form-control','type'=>'file'));
		echo $this->Form->input('edition_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
