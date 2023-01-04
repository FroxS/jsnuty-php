<?php
use jsnuty\app\form\Form;
use jsnuty\app\form\AreaField;

?>
<section class="contact">
        <div class="contentBx">
            <div class="formBx">

                <h2>Edytuj muzykę</h2>
                <?php $form = Form::begin('', 'post') ?>
                <?php echo $form->field($model, 'id',true) ?>
                <?php echo $form->field($model, 'name') ?>
                <?php echo $form->field($model, 'link') ?>
                <?php echo new AreaField($model, 'opis') ?>
                <div class="inputBx">
                    <input type="submit" value="Edytuj">
                </div>
                <?php echo Form::end() ?>

            </div> 
        </div>  
</section>