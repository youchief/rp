<div class="row">
        <div class="col-sm-12">
                <div class="related">
                        <h3><?php echo __('Winners'); ?></h3>

                        <table cellpadding = "0" cellspacing = "0" class="table">
                                <tr>
                                        <th><?php echo __('Firstname'); ?></th>
                                        <th><?php echo __('Lastname'); ?></th>
                                        <th><?php echo __('Address'); ?></th>
                                        <th><?php echo __('Zip'); ?></th>
                                        <th><?php echo __('City'); ?></th>
                                        <th><?php echo __('Email'); ?></th>
                                        <th><?php echo __('Winner'); ?></th>

                                </tr>
                                <?php
                                $i = 0;
                                foreach ($winners as $person):
                                        ?>
                                        <tr>
                                                <td><?php echo $person['firstname']; ?></td>
                                                <td><?php echo $person['lastname']; ?></td>
                                                <td><?php echo $person['address']; ?></td>
                                                <td><?php echo $person['zip']; ?></td>
                                                <td><?php echo $person['city']; ?></td>
                                                <td><?php echo $person['email']; ?></td>
                                                <td><?php echo $person['winner']; ?></td>

                                        </tr>
                                <?php endforeach; ?>
                        </table>


                </div>

        </div>
</div>
<div class="row">
        <div class="col-sm-12">
                <div class="btn-group">
                        <?php echo $this->Html->link(__('Try Again'), array('action' => 'lotery', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-primary')); ?>
                        <?php echo $this->Html->link(__('Validate & Send an email notification'), array('action' => 'validate', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-success')); ?>
                </div>
        </div>
</div>