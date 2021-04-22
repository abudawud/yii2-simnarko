<?php

use app\models\MsOffice;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\time\TimePicker;
use yii\helpers\ArrayHelper;

?>
<?= $form->field($model, 'office_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(MsOffice::find()->orderBy('office_name asc')->all(), 'id', 'office_name'),
    'options' => ['placeholder' => 'Pilih Kantor...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

<?= $form->field($model, 'location_name')->textarea(['rows' => 6]) ?>
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'capture_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih Tanggal...'],
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]); ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'capture_time')->widget(TimePicker::classname(), []); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'sbp_no')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">

        <?= $form->field($model, 'sbp_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih Tanggal...'],
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]); ?>
    </div>
</div>

<?= $form->field($model, 'sbp_doc_file')->widget(FileInput::classname(), [
    'options' => ['accept' => 'application/pdf'],
]); ?>
