<div class='row'>
        <div class='col-sm-8'>
                <div class="coupon">
                        <div class="row">
                                <div class="col-sm-12">
                                        <h1><?php echo $coupon['Coupon']['name']; ?></h1>
                                        <h2><?php echo $coupon['Coupon']['short_description'] ?></h2>

                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-8">
                                        <p class="info">
                                                <?php echo h($coupon['Coupon']['date_place_condition']); ?>
                                        </p>
                                        <p class="description">
                                                <?php echo h($coupon['Coupon']['description']); ?>
                                        </p>
                                </div>
                                <div class="col-sm-4">
                                        <p class="site">
                                                Délai de participation:
                                                <br>
                                                <?php echo $this->Time->format($coupon['Coupon']['deadline'], '%e %B %Y') ?>
                                                <br>
                                                <br>
                                                Plus d'info:
                                                <br>
                                                <?php echo $this->Text->autoLink($coupon['Coupon']['website'], array('target' => '_blank')); ?>
                                        </p>
                                        <p><?php echo $this->Html->link(__('Participer'), array('controller' => 'people', 'action' => 'checkcode', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-success btn_participer')); ?></p>
                                </div>
                        </div>
                        <div class="row">

                                <div class="col-sm-8">
                                        <?php echo $this->Html->image($coupon['Coupon']['img_1'], array('class' => 'img-responsive poster')); ?>
                                </div>
                                <div class="col-sm-4">
                                        <?php echo $this->Html->image('../' . $coupon['Coupon']['img_2'], array('class' => 'thumbnail')); ?>
                                        <?php echo $this->Html->image('../' . $coupon['Coupon']['img_3'], array('class' => 'thumbnail')); ?>
                                </div>                        

                        </div>
                </div>
        </div>
        <div class='col-sm-4'>
                <?php if ($coupon['Coupon']['active'] == 1): ?>
                        <div class="alert alert-success" role="alert">EN COURS</div>


                        <div class="btn-group">
                                <?php echo $this->Html->link(__('Tirage au sort'), array('action' => 'lotery', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-primary')); ?>

                                <?php echo $this->Html->link(__('Fermer ce coupon'), array('action' => 'close', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-danger')); ?>
                        </div>
                <?php else: ?>
                        <div class="alert alert-danger" role="alert">TERMINE</div>

                        <?php echo $this->Html->link(__('Imprimer la liste des gagnants'), array('action' => 'print', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-primary', 'target' => '_blank')); ?>
                <?php endif; ?>
        </div>
</div>
<div class="row">
        <div class="col-sm-12">
                <div class="btn-group">
                        <?php echo $this->Html->link(__('Edit Coupon'), array('action' => 'edit', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                        <?php echo $this->Form->postLink(__('Delete Coupon'), array('action' => 'delete', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?> 
                </div>
        </div>
</div>

<?php if (!empty($coupon['Person'])): ?>
        <div class="row">
                <div class="col-sm-12">
                        <div class="related">
                                <h3><?php echo __('Participants'); ?></h3>

                                <table cellpadding = "0" cellspacing = "0" class="table">
                                        <tr>
                                                <th><?php echo __('Firstname'); ?></th>
                                                <th><?php echo __('Lastname'); ?></th>
                                                <th><?php echo __('Address'); ?></th>
                                                <th><?php echo __('Zip'); ?></th>
                                                <th><?php echo __('City'); ?></th>
                                                <th><?php echo __('Email'); ?></th>
                                                <th><?php echo __('Winner'); ?></th>
                                                <th class="actions"><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php
                                        $i = 0;
                                        foreach ($coupon['Person'] as $person):
                                                ?>
                                                <?php
                                                if ($person['winner']) {
                                                        echo "<tr class='success'>";
                                                } else {
                                                        echo "<tr>";
                                                }
                                                ?>

                                                <td><?php echo $person['firstname']; ?></td>
                                                <td><?php echo $person['lastname']; ?></td>
                                                <td><?php echo $person['address']; ?></td>
                                                <td><?php echo $person['zip']; ?></td>
                                                <td><?php echo $person['city']; ?></td>
                                                <td><?php echo $person['email']; ?></td>
                                                <td><?php echo $person['winner']; ?></td>
                                                <td class="actions">
                                                        <?php echo $this->Html->link(__('View'), array('controller' => 'people', 'action' => 'view', $person['id'])); ?>
                                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'people', 'action' => 'edit', $person['id'])); ?>
                                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'people', 'action' => 'delete', $person['id']), null, __('Are you sure you want to delete # %s?', $person['id'])); ?>
                                                </td>
                                                </tr>
                                        <?php endforeach; ?>
                                </table>


                        </div>

                </div>
        </div>

<?php endif; ?>

