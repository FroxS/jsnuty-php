<?php
use jsnuty\app\form\Form;
use jsnuty\app\form\AreaField;

?>
<section class="contact">
        <div class="contentBx">
            <div class="formBx">

                <h2>Kontakt</h2>
                <?php $form = Form::begin('', 'post') ?>
                
                <?php echo $form->field($model, 'email') ?>
                <?php echo new AreaField($model, 'text') ?>
                <div class="inputBx">
                    <input type="submit" value="Wyślij">
                </div>
                <?php echo Form::end() ?>

            </div> 
        </div>  
</section>