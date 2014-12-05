<div class="people form">
        <?php echo $this->Form->create('Person'); ?>
        <fieldset>
                <legend><?php echo $coupon['Coupon']['name']; ?></legend>
                <?php
                echo $this->Form->input('firstname', array('class' => 'form-control', 'label'=>'Prénom'));
                echo $this->Form->input('lastname', array('class' => 'form-control', 'label'=>'Nom'));
                echo $this->Form->input('address', array('class' => 'form-control', 'label'=>'Adresse'));
                echo $this->Form->input('zip', array('class' => 'form-control', 'label'=>'NPA'));
                echo $this->Form->input('city', array('class' => 'form-control', 'label'=>'Ville'));
                echo $this->Form->input('email', array('class' => 'form-control', 'label'=>'E-mail'));
                //$this->Captcha->render($captchaSettings);
                ?>
        </fieldset>
        <hr>
        <?php echo $this->Form->submit(__('Envoyer'), array('class' => 'btn btn-success')); ?>
        <?php echo $this->Form->end(); ?>
</div>