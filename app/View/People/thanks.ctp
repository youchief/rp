<div class="row">
        <div class="col-xs-12">
                <h1>Merci pour votre participation au tirage au sort pour: <?php echo strtoupper($coupon) ?></h1>
                <p><strong>Seul les gagnants seront avertis par courriel</strong><br>
                        Vous pouvez également participer à d'autres privilèges.
                </p>
                <?php echo $this->Html->link('Retour aux offres', array('controller'=>'coupons', 'action'=>'shop'), array('class'=>'btn btn-rp'))?>
        </div>
</div>