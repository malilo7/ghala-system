<?php
use yii\helpers\Html;

$this->title = 'Ghala System - Best IT Solution for Merchant Payments';
?>

<style>
body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9fafb;
    color: #1f2937;
}

.hero {
    background: url('/images/hero-background.jpg') no-repeat center center fixed;
    background-size: cover;
    background-color: rgb(30, 93, 175);
    color: #ffffff;
    padding: 150px 20px;
    position: relative;
    min-height: 550px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0, 0, 50, 0.7), rgba(0, 0, 50, 0.3));
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 850px;
    padding: 0 20px;
    text-align: center;
}

.hero-content h1 {
    font-size: 3.2rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 20px;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
}

.hero-content p {
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1.6;
    margin-bottom: 30px;
    opacity: 0.95;
}

.cards-section {
    max-width: 1200px;
    margin: 70px auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    padding: 0 20px;
}

.card-custom {
    background: #ffffff;
    border-radius: 14px;
    border: 2px solid #e5e7eb; /* Light gray visible border */
    padding: 30px 20px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    color: #1e293b;
    text-decoration: none;
}

.card-custom:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    background-color: #f3f4f6;
    border-color: #cbd5e1; /* Slightly darker on hover */
}

.card-icon {
    font-size: 3.5rem;
    margin-bottom: 20px;
    color: #2563eb;
}

.card-title {
    font-size: 1.6rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 12px;
}

.card-desc {
    font-size: 1rem;
    color: #374151;
    line-height: 1.5;
}

.btn-cta {
    background: linear-gradient(135deg, #facc15, #f59e0b);
    color: #1f2937;
    font-weight: 600;
    padding: 14px 35px;
    border-radius: 50px;
    border: none;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    display: inline-block;
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.35);
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-cta:hover {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.45);
    color: #111827;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .hero {
        padding: 100px 20px;
        min-height: 400px;
    }
    .hero-content h1 {
        font-size: 2.4rem;
    }
    .hero-content p {
        font-size: 1.1rem;
    }
    .cards-section {
        grid-template-columns: 1fr;
        margin: 50px auto;
    }
}

@media (max-width: 480px) {
    .hero-content h1 {
        font-size: 1.8rem;
    }
    .hero-content p {
        font-size: 0.95rem;
    }
    .btn-cta {
        padding: 12px 28px;
        font-size: 0.85rem;
    }
}
</style>

<div class="site-index">
    <section class="hero position-relative">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Best IT Solution for Merchant Payments & Orders</h1>
            <p>Streamline merchant payment configurations, track customer orders, and monitor payments seamlessly with Ghala.</p>
            <?= Html::a('Get Started', ['merchant/index'], ['class' => 'btn btn-cta']) ?>
        </div>
    </section>

    <section class="cards-section">
        <a href="<?= Yii::$app->urlManager->createUrl(['merchant/index']) ?>" class="card-custom">
            <div class="card-icon">🏪</div>
            <div class="card-title">Merchants</div>
            <div class="card-desc">Manage merchant profiles and payment settings with ease and precision.</div>
        </a>

        <a href="<?= Yii::$app->urlManager->createUrl(['order/index']) ?>" class="card-custom">
            <div class="card-icon">🛒</div>
            <div class="card-title">Orders</div>
            <div class="card-desc">Real-time tracking of customer orders and payment statuses.</div>
        </a>

        <a href="<?= Yii::$app->urlManager->createUrl(['merchant-payment-config/index']) ?>" class="card-custom">
            <div class="card-icon">💳</div>
            <div class="card-title">Payment Configs</div>
            <div class="card-desc">Customize payment methods for each merchant effortlessly.</div>
        </a>
    </section>
</div>
