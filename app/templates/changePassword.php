<?php
use jsnuty\app\form\Form;
use jsnuty\app\form\AreaField;

?>
<section class="contact">
        <div class="contentBx">
            <div class="formBx">

                <h2>Zmień hasło</h2>
                <?php $form = Form::begin('', 'post') ?>
                <?php echo $form->field($model, 'password')->passworldField() ?>
                <?php echo $form->field($model, 'confirmPassword')->passworldField() ?>
                <div class="inputBx">
                    <input type="submit" value="Zatwierdź">
                </div>

                <?php echo Form::end() ?>

                <a href="/jsnuty/profile">Profil</a>
            </div> 
            
        </div>  
</section>