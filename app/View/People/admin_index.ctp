<div class="people index">
        <h2><?php echo __('People'); ?> <?php echo $this->Html->link(\__('+'), array('action' => 'add'), array('class'=>'btn btn-success btn-sm')); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('firstname'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('lastname'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('address'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('zip'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('city'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('winner'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('coupon_id'); ?></th>
                                                <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($people as $person): ?>
	<tr>
		<td><?php echo h($person['Person']['id']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['address']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['zip']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['city']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['email']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['winner']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($person['Coupon']['name'], array('controller' => 'coupons', 'action' => 'view', $person['Coupon']['id'])); ?>
		</td>
		<td class="actions">
		<div class="btn-group">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $person['Person']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $person['Person']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $person['Person']['id']), array('class'=>'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $person['Person']['id'])); ?>
		</div>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <div class="well well-sm">
                <?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
        </div>
        <ul class="pagination">
                <?php echo '<li>'.$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')).'</li>' ?>
                <?php echo '<li>'.$this->Paginator->numbers(array('separator' => '')).'</li>' ?>
                <?php echo '<li>'.$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')).'</li>' ?>
        </ul>
</div>
