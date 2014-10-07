<div class="coupon">
        <div class="row">
                <div class="col-xs-12">
                        <h1><?php echo h($coupon['Coupon']['name']); ?></h1>
                        <h2><?php echo $coupon['Coupon']['short_description'] ?> *</h2>

                </div>
        </div>
        <div class="row">
                <div class="col-xs-8">
                        <p class="info">
                                <?php echo $coupon['Coupon']['date_place_condition']; ?>
                        </p>
                        <p class="description">
                                <?php echo $coupon['Coupon']['description']; ?>
                        </p>
                </div>
                <div class="col-xs-4">
                        <p class="site">
                                Plus d'info:
                                <br>
                                <?php echo $this->Text->autoLink($coupon['Coupon']['website'], array('target' => '_blank')); ?>
                        </p>
                        <p><?php echo $this->Html->link(__('Participer'), array('controller' => 'people', 'action' => 'checkcode', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-success btn_participer')); ?></p>
                </div>
        </div>
        <div class="row">

                <div class="col-xs-8">
                        <?php echo $this->Html->image('../' . $coupon['Coupon']['img_1'], array('class' => 'img-responsive poster', 'id'=>'mainImage')); ?>
                </div>
                <div class="col-xs-4">
                        <?php echo $this->Html->image('../' . $coupon['Coupon']['img_2'], array('class' => 'thumbnail', 'id'=>'imageClick1')); ?>
                        <?php echo $this->Html->image('../' . $coupon['Coupon']['img_3'], array('class' => 'thumbnail', 'id'=>'imageClick2')); ?>
                </div>                        

        </div>
        <div class='row'>
                <div class='col-xs-12'>
                        <p class='legend'>* Avantages exclusifs réservés à la clientèle de Retraites Populaires</p>
                </div>
        </div>
</div>

