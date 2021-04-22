<?php

use kartik\date\DatePicker;
?>
<?= $form->field($model, 'bast_agency')->textInput(['maxlength' => true]) ?>

<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'bast_no')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'bast_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih Tanggal...'],
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]); ?>
    </div>
</div>
