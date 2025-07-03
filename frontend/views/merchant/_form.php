<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Merchant $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="merchant-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'row g-3'],
        'fieldConfig' => [
            'options' => ['class' => 'col-md-6'],
            'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'form-label fw-bold text-primary'],
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput([
        'type' => 'datetime-local',
        'class' => 'form-control',
    ]) ?>

    <div class="form-group col-12 mt-3">
        <?= Html::submitButton('💾 Save Merchant', ['class' => 'btn btn-primary px-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
