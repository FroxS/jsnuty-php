<?php
use jsnuty\app\form\Form;
use jsnuty\app\form\AreaField;

?>
<section class="contact">
        <div class="contentBx">
            <div class="formBx">

                <h2>Dodaj muzykę</h2>
                <?php $form = Form::begin('', 'post') ?>
                <?php echo $form->field($model, 'name') ?>
                <?php echo $form->field($model, 'link') ?>
                <?php echo new AreaField($model, 'opis') ?>
                <div class="inputBx">
                    <input type="submit" value="Dodaj">
                </div>
                <?php echo Form::end() ?>

            </div> 
        </div>  
</section>