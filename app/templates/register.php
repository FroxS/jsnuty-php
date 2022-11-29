<?php

use jsnuty\app\form\Form;

?>
<section class="register">
    <div class="imgBx">
        <img src="img/register.jpg">
    </div>
    <div class="contentBx">
        <header class="nav">
            <a href="/jsnuty/"><img src="img/logo-white.png" class="logo"></a>
        </header>
        <div class="formBx">
            <h2>Rejestracja</h2>
            <?php $form = Form::begin('', 'post') ?>
            <?php echo $form->field($model, 'username') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passworldField() ?>
            <?php echo $form->field($model, 'confirmPassword')->passworldField() ?>
            <div class="terms">
                <label>
                    <input required type="checkbox" name="terms"> 
                    Zaakceptuj <a href="#terms">warunki</a>*
                    <p class="invaildmessage"></p>
                </label>
            </div>
            <div class="inputBx">
                <input type="submit" value="Zarejestruj sie">
            </div>
            <div class="inputBx">
                <p>Masz juz konto? <a href="/jsnuty/login">Zaloguj się</a></p>
            </div>
            <?php echo Form::end() ?>
        </div>
    </div>
</section>