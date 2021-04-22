<?php

use kartik\date\DatePicker;
use kartik\file\FileInput;

?>
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'case_reff_id')->textInput() ?>
    </div>
    <div class="col-sm-6">

        <?= $form->field($model, 'transport_reff_id')->textInput() ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'carier_reff_id')->textInput() ?>
    </div>
    <div class="col-sm-6">

        <?= $form->field($model, 'mode_id')->textInput() ?>
    </div>
</div>

<?= $form->field($model, 'mode_detail')->textarea(['rows' => 6]) ?>

<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'doc_no')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">

        <?= $form->field($model, 'doc_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih Tanggal...'],
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]); ?>
    </div>
</div>

<?= $form->field($model, 'doc_photo_file')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*', 'placeholder' => "Pilih File..."],
]); ?>
