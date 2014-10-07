<div class="users view">
        <h2><?php echo __('User'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> 
        </div>
</div>
