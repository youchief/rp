<div class="editions view">
        <h2><?php echo h($edition['Edition']['name']); ?></h2>
        <dl>

                <dt><?php echo __('Created'); ?></dt>
                <dd>
                        <?php echo h($edition['Edition']['created']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Date'); ?></dt>
                <dd>
                        <?php echo h($edition['Edition']['date']); ?>
                        &nbsp;
                </dd>

                <dt><?php echo __('Code'); ?></dt>
                <dd>
                        <?php echo h($edition['Edition']['code']); ?>
                        &nbsp;
                </dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                <?php echo $this->Html->link(__('Edit Edition'), array('action' => 'edit', $edition['Edition']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Form->postLink(__('Delete Edition'), array('action' => 'delete', $edition['Edition']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $edition['Edition']['id'])); ?> 
        </div>
</div>
<div class="related">
        <h3><?php echo __('Related Coupons'); ?></h3>
        <?php if (!empty($edition['Coupon'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
                        <tr>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Nb Available'); ?></th>
                                <th><?php echo __('Actions'); ?></th>


                        </tr>
                        <?php
                        $i = 0;
                        foreach ($edition['Coupon'] as $coupon):
                                ?>
                                <tr>
                                        <td><?php echo $coupon['name']; ?></td>
                                        <td><?php echo $coupon['nb_available']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'coupons', 'action' => 'view', $coupon['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'coupons', 'action' => 'edit', $coupon['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'coupons', 'action' => 'delete', $coupon['id']), null, __('Are you sure you want to delete # %s?', $coupon['id'])); ?>
                                        </td>
                                </tr>
                <?php endforeach; ?>
                </table>
<?php endif; ?>

</div>
