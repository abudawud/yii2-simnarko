<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CaptureData */

$this->title = 'Input Data Tangkapan';
$this->params['breadcrumbs'][] = ['label' => 'Capture Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capture-data-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
