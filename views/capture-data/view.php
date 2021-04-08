<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CaptureData */
?>
<div class="capture-data-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'capture_id',
            'office_id',
            'location_name:ntext',
            'capture_date',
            'capture_time',
            'sbp_no',
            'sbp_date',
            'count_1',
            'unit_1_reff_id',
            'count_2',
            'unit_2_reff_id',
            'case_reff_id',
            'transport_reff_id',
            'carier_reff_id',
            'mode_id',
            'mode_detail:ntext',
            'doc_no',
            'doc_date',
            'transport_media_id',
            'vehicle_no',
            'src_city_id',
            'src_address:ntext',
            'transit',
            'dst_city_id',
            'dst_address:ntext',
            'disclosure_id',
            'src_info',
            'additional_info:ntext',
            'bast_agency',
            'bast_no',
            'bast_date',
            'bast_input_date',
            'sbp_doc_name',
            'sbp_doc_file',
            'doc_photo_name',
            'doc_photo_file',
            'user_id',
        ],
    ]) ?>

</div>
