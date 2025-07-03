<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MerchantPaymentConfig $model */

$this->title = 'Update Merchant Payment Config: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Merchant Payment Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="merchant-payment-config-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
