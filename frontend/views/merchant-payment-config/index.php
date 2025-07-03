<?php

use common\models\MerchantPaymentConfig;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\MerchantPaymentConfigSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Merchant Payment Configs';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="merchant-payment-config-index container py-4">
    <div class="card shadow-lg border-0 rounded-4 bg-white p-4">

        <h1 class="mb-4 text-primary fw-bold"><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('➕ Create Payment Config', ['create'], ['class' => 'btn btn-primary shadow-sm']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-bordered table-striped table-hover align-middle text-center'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'merchant_id',
                'payment_type',
                'provider',
                [
                    'attribute' => 'config_data',
                    'format' => 'ntext',
                ],
                [
                    'class' => ActionColumn::class,
                    'header' => 'Actions',
                    'buttons' => [
                        'view' => fn($url, $model) => Html::a('🔍', $url, ['class' => 'btn btn-sm btn-outline-primary']),
                        'update' => fn($url, $model) => Html::a('✏️', $url, ['class' => 'btn btn-sm btn-outline-warning']),
                        'delete' => fn($url, $model) => Html::a('🗑️', $url, [
                            'class' => 'btn btn-sm btn-outline-danger',
                            'data' => ['confirm' => 'Are you sure to delete this config?', 'method' => 'post'],
                        ]),
                    ],
                    'urlCreator' => fn($action, MerchantPaymentConfig $model) =>
                        Url::toRoute([$action, 'id' => $model->id]),
                ],
            ],
        ]); ?>
    </div>
</div>
