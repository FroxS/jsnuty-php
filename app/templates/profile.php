<?php
use jsnuty\app\form\Form;
use jsnuty\app\form\AreaField;

?>
<section class="contact">
        <div class="contentBx">
            <div class="formBx">

                <h2>Dane</h2>
                <?php $form = Form::begin('', 'post') ?>
                <?php echo $form->field($model, 'email') ?>
                <?php echo $form->field($model, 'username') ?>
                <div class="inputBx">
                    <input type="submit" value="Zatwierdź">
                </div>
                <?php echo Form::end() ?>

            </div> 
        </div>  
</section>