<div class="index">
        <h2><?php echo __('Coupons'); ?> <?php echo $this->Html->link(\__('+'), array('action' => 'add'), array('class' => 'btn btn-success btn-sm')); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th><?php echo $this->Paginator->sort('edition_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('nb_available'); ?></th>

                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($coupons as $coupon): ?>
                        <tr>
                                <td><?php echo h($coupon['Coupon']['name']); ?>&nbsp;</td>
                                <td>
                                        <?php echo $this->Html->link($coupon['Edition']['name'], array('controller' => 'editions', 'action' => 'view', $coupon['Edition']['id'])); ?>
                                </td>
                                <td><?php echo h($coupon['Coupon']['nb_available']); ?>&nbsp;</td>

                                <td class="actions">
                                        <div class="btn-group">
                                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $coupon['Coupon']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $coupon['Coupon']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coupon['Coupon']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?>
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
                <?php echo '<li>' . $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')) . '</li>' ?>
                <?php echo '<li>' . $this->Paginator->numbers(array('separator' => '')) . '</li>' ?>
                <?php echo '<li>' . $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')) . '</li>' ?>
        </ul>
</div>
