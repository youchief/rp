<div class="people view">
        <h2><?php echo __('Person'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($person['Person']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($person['Person']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($person['Person']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($person['Person']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($person['Person']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($person['Person']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($person['Person']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Winner'); ?></dt>
		<dd>
			<?php echo h($person['Person']['winner']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coupon'); ?></dt>
		<dd>
			<?php echo $this->Html->link($person['Coupon']['name'], array('controller' => 'coupons', 'action' => 'view', $person['Coupon']['id'])); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Person'), array('action' => 'edit', $person['Person']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Person'), array('action' => 'delete', $person['Person']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $person['Person']['id'])); ?> 
        </div>
</div>
