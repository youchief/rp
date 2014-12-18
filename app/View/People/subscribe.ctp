<div class="people form">
        <?php echo $this->Form->create('Person'); ?>
        <fieldset>
            <h1><?php echo $coupon['Coupon']['name']; ?></h1><br/>
                <?php
                echo $this->Form->input('firstname', array('class' => 'form-control', 'label'=>'Prénom'));
                echo $this->Form->input('lastname', array('class' => 'form-control', 'label'=>'Nom'));
                echo $this->Form->input('address', array('class' => 'form-control', 'label'=>'Rue et numéro'));
                echo $this->Form->input('zip', array('class' => 'form-control', 'label'=>'Code postal'));
                echo $this->Form->input('city', array('class' => 'form-control', 'label'=>'Localité'));
                echo $this->Form->input('email', array('class' => 'form-control', 'label'=>'E-mail'));
                //$this->Captcha->render($captchaSettings);
                ?>
        </fieldset>
        <br>
        <?php echo $this->Form->submit(__('Envoyer'), array('class' => 'btn btn-rp')); ?>
        <?php echo $this->Form->end(); ?>
</div>