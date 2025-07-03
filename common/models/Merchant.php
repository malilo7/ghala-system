<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "merchant".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $created_at
 *
 * @property MerchantPaymentConfig[] $merchantPaymentConfigs
 * @property Order[] $orders
 */
class Merchant extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'merchant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['created_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[MerchantPaymentConfigs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantPaymentConfigs()
    {
        return $this->hasMany(MerchantPaymentConfig::class, ['merchant_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['merchant_id' => 'id']);
    }

}
