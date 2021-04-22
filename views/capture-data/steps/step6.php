<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'disclosure_id')->textInput() ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'src_info')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<?= $form->field($model, 'additional_info')->textarea(['rows' => 6]) ?>
