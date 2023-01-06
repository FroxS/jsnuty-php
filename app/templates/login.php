<?php

use jsnuty\app\form\Form;

?>
<section class="login">
    <div class="imgBx">
        <img src="img/login.jpg">
    </div>
    <div class="contentBx">
        <header class="nav">
            <a href="/jsnuty/"><img src="img/logo-white.png" class="logo"></a>
        </header>
        <div class="formBx">
          
            <h2>Login</h2>
            <?php $form = Form::begin('', 'post') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passworldField() ?>
            <div class="remember">
                <label><input type="checkbox"> Zapamietaj mnie</label>
            </div>
            <div class="inputBx">
                <input type="submit" value="Zarejestruj sie">
            </div>
            <div class="inputBx">
                <p>Nie masz konta? <a href="/jsnuty/register">Zarejestruj sie</a></p>
            </div>
            <?php echo Form::end() ?>
            
        </div>
    </div>
</section>