<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'transport_media_id')->textInput() ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'vehicle_no')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<?= $form->field($model, 'src_city_id')->textInput() ?>

<?= $form->field($model, 'src_address')->textarea(['rows' => 6]) ?>

<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'transit')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">

        <?= $form->field($model, 'dst_city_id')->textInput() ?>
    </div>
</div>

<?= $form->field($model, 'dst_address')->textarea(['rows' => 6]) ?>
