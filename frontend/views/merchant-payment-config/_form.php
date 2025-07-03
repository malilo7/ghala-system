<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\MerchantPaymentConfig $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="merchant-payment-config-form container py-4">
    <div class="card shadow-lg border-0 rounded-4 bg-white p-4">

        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'row g-3'],
            'fieldConfig' => [
                'options' => ['class' => 'col-md-6'],
                'labelOptions' => ['class' => 'form-label fw-bold text-primary'],
                'inputOptions' => ['class' => 'form-control'],
            ],
        ]); ?>

        <?= $form->field($model, 'merchant_id')->textInput() ?>

        <?= $form->field($model, 'payment_type')->dropDownList([
            'mobile' => 'Mobile',
            'card' => 'Card',
            'bank' => 'Bank',
        ], ['prompt' => 'Select Payment Type']) ?>

        <?= $form->field($model, 'provider')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'config_data')->textInput(['maxlength' => true]) ?>

        <div class="form-group col-12 mt-3">
            <?= Html::submitButton('💾 Save Config', ['class' => 'btn btn-primary px-4']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
