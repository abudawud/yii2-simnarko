<?php

use app\models\MsOffice;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\time\TimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CaptureData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="form-bootstrapWizard">
            <ul class="bootstrapWizard form-wizard">
                <li data-target="#step1" id="tab_step_1" class="active">
                    <a href="#tab1" data-toggle="tab" class="active"> <span class="step">1</span> <span class="title"><?= Yii::t('app', 'Dokumen Kasus') ?></span> </a>
                </li>
                <li data-target="#step2" id="tab_step_2">
                    <a href="#tab2" data-toggle="tab" class="active"> <span class="step">2</span> <span class="title"><?= Yii::t('app', 'Data NPP') ?></a>
                </li>
                <li data-target="#step3" id="tab_step_3">
                    <a href="#tab3" data-toggle="tab" class="active"> <span class="step">3</span> <span class="title"><?= Yii::t('app', 'Modus Operandi') ?></a>
                </li>
                <li data-target="#step4" id="tab_step_4">
                    <a href="#tab4" data-toggle="tab" class="active"> <span class="step">4</span> <span class="title"><?= Yii::t('app', 'Data Pelaku') ?></span> </a>
                </li>
                <li data-target="#step5" id="tab_step_5">
                    <a href="#tab4" data-toggle="tab" class="active"> <span class="step">5</span> <span class="title"><?= Yii::t('app', 'Sarkut & Rute') ?></span> </a>
                </li>
                <li data-target="#step6" id="tab_step_6">
                    <a href="#tab4" data-toggle="tab" class="active"> <span class="step">6</span> <span class="title"><?= Yii::t('app', 'Informasi Pengungkapan') ?></span> </a>
                </li>
                <li data-target="#step7" id="tab_step_7">
                    <a href="#tab4" data-toggle="tab" class="active"> <span class="step">7</span> <span class="title"><?= Yii::t('app', 'Data BAST') ?></span> </a>
                </li>
                <li data-target="#step8" id="tab_step_8">
                    <a href="#tab5" data-toggle="tab"> <span class="step">8</span> <span class="title"><?= Yii::t('app', 'Selesai') ?></span> </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="panel-body" style="display: block;">
        <div class="capture-data-form" id="bootstrapwizard">

            <?php $form = ActiveForm::begin(); ?>

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

            <?= $form->field($model, 'sbp_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sbp_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Pilih Tanggal...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]); ?>

            <?= $form->field($model, 'count_1')->textInput() ?>

            <?= $form->field($model, 'unit_1_reff_id')->textInput() ?>

            <?= $form->field($model, 'count_2')->textInput() ?>

            <?= $form->field($model, 'unit_2_reff_id')->textInput() ?>

            <?= $form->field($model, 'case_reff_id')->textInput() ?>

            <?= $form->field($model, 'transport_reff_id')->textInput() ?>

            <?= $form->field($model, 'carier_reff_id')->textInput() ?>

            <?= $form->field($model, 'mode_id')->textInput() ?>

            <?= $form->field($model, 'mode_detail')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'doc_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'doc_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Pilih Tanggal...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]); ?>

            <?= $form->field($model, 'transport_media_id')->textInput() ?>

            <?= $form->field($model, 'vehicle_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'src_city_id')->textInput() ?>

            <?= $form->field($model, 'src_address')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'transit')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'dst_city_id')->textInput() ?>

            <?= $form->field($model, 'dst_address')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'disclosure_id')->textInput() ?>

            <?= $form->field($model, 'src_info')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'additional_info')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'bast_agency')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'bast_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'bast_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Pilih Tanggal...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]); ?>


            <?= $form->field($model, 'sbp_doc_file')->widget(FileInput::classname(), [
                'options' => ['accept' => 'application/pdf'],
            ]); ?>

            <?= $form->field($model, 'doc_photo_file')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*', 'placeholder' => "Pilih File..."],
            ]); ?>


            <?php if (!Yii::$app->request->isAjax) { ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php } ?>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
