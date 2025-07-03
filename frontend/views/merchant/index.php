<?php

use common\models\Merchant;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\MerchantSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Merchants';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="merchant-index container py-4">

    <div class="card shadow-lg border-0 rounded-4 bg-white p-4">

        <h1 class="mb-4 text-primary fw-bold"><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('➕ Create Merchant', ['create'], ['class' => 'btn btn-primary shadow-sm']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-bordered table-striped table-hover align-middle text-center'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'email:email',
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:Y-m-d H:i'],
                    'headerOptions' => ['class' => 'text-primary'],
                ],
                [
                    'class' => ActionColumn::class,
                    'header' => 'Actions',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('🔍', $url, ['class' => 'btn btn-sm btn-outline-primary']);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('✏️', $url, ['class' => 'btn btn-sm btn-outline-warning']);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('🗑️', $url, [
                                'class' => 'btn btn-sm btn-outline-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this merchant?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, Merchant $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
