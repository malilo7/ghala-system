<?php

use common\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-index container py-4">

    <div class="card shadow-lg border-0 rounded-4 bg-white p-4">
        <h1 class="mb-4 text-primary fw-bold"><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('➕ Create Order', ['create'], ['class' => 'btn btn-primary shadow-sm']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-bordered table-striped table-hover align-middle text-center'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'merchant_id',
                'product_name',
                [
                    'attribute' => 'total_amount',
                    'format' => ['currency'],
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $badge = [
                            'pending' => 'warning',
                            'paid' => 'success',
                            'failed' => 'danger',
                        ];
                        return '<span class="badge bg-' . $badge[$model->status] . ' px-3 py-2 text-uppercase fw-semibold">' . strtoupper($model->status) . '</span>';
                    }
                ],
                [
                    'class' => ActionColumn::class,
                    'template' => '{view} {update} {delete} {simulate}',
                    'buttons' => [
                        'simulate' => function ($url, $model, $key) {
                            if ($model->status === 'pending') {
                                return Html::a('💰 Simulate', ['simulate-payment', 'id' => $model->id], [
                                    'class' => 'btn btn-sm btn-warning shadow-sm',
                                    'data' => [
                                        'confirm' => 'Simulate payment now?',
                                        'method' => 'post',
                                    ],
                                ]);
                            }
                            return null;
                        },
                    ],
                    'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
