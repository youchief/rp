<div class="coupon">
        <div class="row">
                <div class="col-sm-12">
                        <h1><?php echo h($coupon['Coupon']['name']); ?></h1>
                        <h2><?php echo $coupon['Coupon']['short_description'] ?> *</h2>

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
                                Plus d'info:
                                <br>
                                <?php echo $this->Text->autoLink($coupon['Coupon']['website'], array('target'=>'_blank')); ?>
                        </p>
                        <p><?php echo $this->Html->link(__('Participer'), array('controller' => 'people', 'action' => 'checkcode', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-success btn_participer btn-disabled')); ?></p>
                </div>
        </div>
        <div class="row">

                <div class="col-sm-8">
                        <?php echo $this->Html->image('../' . $coupon['Coupon']['img_1'], array('class' => 'img-responsive poster')); ?>
                </div>
                <div class="col-sm-4">
                        <?php echo $this->Html->image('../' . $coupon['Coupon']['img_2'], array('class' => 'thumbnail')); ?>
                        <?php echo $this->Html->image('../' . $coupon['Coupon']['img_3'], array('class' => 'thumbnail')); ?>
                </div>                        

        </div>
        <div class='row'>
                <div class='col-sm-12'>
                        <p class='legend'>* Avantages exclusifs réservés à la clientèle de Retraites Populaires</p>
                </div>
        </div>
</div>
