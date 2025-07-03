<?php

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- 🌍 Custom Styling -->
    <style>
        body {
            background: url('<?= Yii::getAlias('@web/images/hero-bg.jpg') ?>') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            background: rgba(255, 255, 255, 0.95);
            color: #000;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.6);
            color: #ccc;
            font-size: 13px;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            font-size: 16px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'Ghala System',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-primary',
        ],
        'innerContainerOptions' => ['class' => 'container'],
    ]);

    $menuItems = [
        ['label' => '🏠 Home', 'url' => ['/site/index']],
        ['label' => '🛒 Merchants', 'url' => ['/merchant/index']],
        ['label' => '📦 Orders', 'url' => ['/order/index']],
        ['label' => '💳 Payment Configs', 'url' => ['/merchant-payment-config/index']],
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0 pt-4">
    <div class="container main-content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3">
    <div class="container text-center">
        <span>&copy; <?= date('Y') ?> Ghala System</span>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
