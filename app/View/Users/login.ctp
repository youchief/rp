<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Connexion'); ?></legend>
	<?php
		echo $this->Form->input('username', array('class'=>'form-control', 'label'=>'Utilisateur'));
		echo $this->Form->input('password', array('class'=>'form-control','label'=>'Mot de passe'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Envoyer'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
