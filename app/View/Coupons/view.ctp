<div class="coupon">
        <div class="row">
                <div class="col-xs-12">
                        <h1><?php echo $coupon['Coupon']['name']; ?></h1>
                        <h2><?php echo $coupon['Coupon']['short_description'] ?></h2>

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
                                Délai de participation:
                                <br>
                                <?php echo $this->Time->format($coupon['Coupon']['deadline'], '%e %B %Y')?>
                                <br>
                                <br>
                                <?php if (!empty($coupon['Coupon']['website'])):?>
                                Plus d'info:
                                <br>
                                <?php echo $this->Text->autoLink($coupon['Coupon']['website'], array('target' => '_blank')); ?>
                                <?php endif;?>
                        </p>
                        <p><?php echo $this->Html->link(__('Participer au tirage au sort'), array('controller' => 'people', 'action' => 'code', $coupon['Coupon']['id']), array('class' => 'btn btn-sm btn-success btn_participer')); ?></p>
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
       
</div>

