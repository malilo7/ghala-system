<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MerchantPaymentConfig $model */

$this->title = 'Create Merchant Payment Config';
$this->params['breadcrumbs'][] = ['label' => 'Merchant Payment Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="merchant-payment-config-create container py-4">
    <div class="card shadow-lg border-0 rounded-4 bg-white p-4">

        <h1 class="mb-4 text-primary fw-bold"><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
