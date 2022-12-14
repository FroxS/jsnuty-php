<?php
use jsnuty\app\form\Form;
use jsnuty\app\form\AreaField;
use jsnuty\app\library\Application;

?>
<section class="contact">
        <div class="contentBx">
            <div class="formBx">
                <h2>Dane użytkownika <?php echo Application::$app->user->username; ?></h2>
                <?php $form = Form::begin('', 'post') ?>
                <?php echo $form->field($model, 'email') ?>
                <?php echo $form->field($model, 'username') ?>
                <div class="inputBx">
                    <input type="submit" value="Zatwierdź">
                </div>
                <?php echo Form::end() ?>
                <a href="/jsnuty/profile/password">Zmień hasło</a>
            </div> 
            
        </div>  
</section>