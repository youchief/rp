<div class="row"   id="">
        <?php foreach ($coupons as $coupon): ?>
                <div class="col-sm-6 col-xs-6">
                        <div class="pic_view">
                                <?php echo $this->Html->image("../" . $coupon['Coupon']['img_1'], array('width' => '100%')); ?>
                                <div class='header_h3'>
                                                <h3><?php echo $coupon['Coupon']['name'] ?></h3>
                                </div>
                                <div class="coupon_thumb_description">
                                        <div class="col-xs-7">
                                                <p><?php echo $this->Text->truncate($coupon['Coupon']['short_description'], 150) ?></p>
                                        </div>
                                        <div class="col-xs-5">
                                                <p><?php echo $this->Html->link(__('Voir l\'offre'), array('controller' => 'coupons', 'action' => 'view', $coupon['Coupon']['id']), array('class' => 'btn btn-success', 'escape' => false)) ?></p>
                                        </div>
                                </div>
                        </div>
                </div>
        <?php endforeach; ?>
</div>



