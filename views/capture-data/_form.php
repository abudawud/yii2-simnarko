<?php

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
                    <a href="#tab1" data-toggle="tab" data-steps="1" class="active"> <span class="step">1</span> <span class="title"><?= Yii::t('app', 'Dokumen Kasus') ?></span> </a>
                </li>
                <li data-target="#step2" id="tab_step_2">
                    <a href="#tab2" data-toggle="tab" data-steps="2"> <span class="step">2</span> <span class="title"><?= Yii::t('app', 'Data NPP') ?></a>
                </li>
                <li data-target="#step3" id="tab_step_3">
                    <a href="#tab3" data-toggle="tab" data-steps="3"> <span class="step">3</span> <span class="title"><?= Yii::t('app', 'Modus Operandi') ?></a>
                </li>
                <li data-target="#step4" id="tab_step_4">
                    <a href="#tab4" data-toggle="tab" data-steps="4"> <span class="step">4</span> <span class="title"><?= Yii::t('app', 'Data Pelaku') ?></span> </a>
                </li>
                <li data-target="#step5" id="tab_step_5">
                    <a href="#tab4" data-toggle="tab" data-steps="5"> <span class="step">5</span> <span class="title"><?= Yii::t('app', 'Sarkut & Rute') ?></span> </a>
                </li>
                <li data-target="#step6" id="tab_step_6">
                    <a href="#tab4" data-toggle="tab" data-steps="6"> <span class="step">6</span> <span class="title"><?= Yii::t('app', 'Informasi Pengungkapan') ?></span> </a>
                </li>
                <li data-target="#step7" id="tab_step_7">
                    <a href="#tab4" data-toggle="tab" data-steps="7"> <span class="step">7</span> <span class="title"><?= Yii::t('app', 'Data BAST') ?></span> </a>
                </li>
                <li data-target="#step8" id="tab_step_8">
                    <a href="#tab5" data-toggle="tab" data-steps="8"> <span class="step">8</span> <span class="title"><?= Yii::t('app', 'Selesai') ?></span> </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="panel-body" style="display: block;">
        <div class="capture-data-form" id="bootstrapwizard">

            <?php $form = ActiveForm::begin(); ?>

            <?php for ($i = 1; $i < 9; $i++) : ?>
                <div class="step-content" <?= $i != 1 ? 'style="display: none"' : '' ?> id="step<?= $i ?>">
                    <?= $this->render("steps/step$i.php", [
                        'model' => $model,
                        'form' => $form
                    ]);
                    ?>
                </div>
            <?php endfor; ?>


        </div>
    </div>
    <div class="panel-footer text-right">
        <?php if (!Yii::$app->request->isAjax) { ?>
                <button id="step-prev" style="display: none;" class="btn btn-info"><span class="fa fa-chevron-left"></span> Previous</button>
                <button id="step-next" class="btn btn-info">Next <span class="fa fa-chevron-right"></span></button>
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['id' => 'step-submit', 'style' => 'display: none', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php } ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$script = <<< JS
const startStep = 1;
const endStep = 8;

var lastStep = 1;

function moveStep(lStep, cStep){
    $("#tab_step_"+lStep).removeClass('active');
    $("#tab_step_"+cStep).addClass('active');

    $("div#step"+lStep).toggle('slide');
    $("div#step"+cStep).toggle('slide');

    // step control
    $('#step-submit').hide();
    if(cStep == startStep){
        $('#step-prev').hide();
        $('#step-next').show();
    }else if(cStep == endStep){
        $('#step-prev').show();
        $('#step-next').hide();
        $('#step-submit').show();
    }else{
        $('#step-prev').show();
        $('#step-next').show();
    }

    lastStep = cStep;
}

$( document ).ready(function() {
    $('.form-wizard').find('a').on('click', function(){
        const step = $(this).data('steps');

        if (lastStep == step)
            return;

        moveStep(lastStep, step);
    });

    $('#step-next').on('click', function() {
        const step = lastStep + 1;
        moveStep(lastStep, step);
    });

    $('#step-prev').on('click', function() {
        const step = lastStep - 1;
        moveStep(lastStep, step);
    });
});
JS;
$this->registerJs($script);
?>
