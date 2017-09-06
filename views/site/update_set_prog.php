<?php
// Форма редактирования настроек программы
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="form-group">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'enableAjaxValidation' => false,]); ?>

    <?= $form->field($model, 'kod_ek')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'ОК' : 'OK', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
