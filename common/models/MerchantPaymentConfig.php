<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "merchant_payment_config".
 *
 * @property int $id
 * @property int $merchant_id
 * @property string $payment_type
 * @property string $provider
 * @property string $config_data
 * @property string|null $created_at
 *
 * @property Merchant $merchant
 */
class MerchantPaymentConfig extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const PAYMENT_TYPE_MOBILE = 'mobile';
    const PAYMENT_TYPE_CARD = 'card';
    const PAYMENT_TYPE_BANK = 'bank';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'merchant_payment_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['merchant_id', 'payment_type', 'provider', 'config_data'], 'required'],
            [['merchant_id'], 'integer'],
            [['payment_type', 'config_data'], 'string'],
            [['created_at'], 'safe'],
            [['provider'], 'string', 'max' => 100],
            ['payment_type', 'in', 'range' => array_keys(self::optsPaymentType())],
            [['merchant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Merchant::class, 'targetAttribute' => ['merchant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_id' => 'Merchant ID',
            'payment_type' => 'Payment Type',
            'provider' => 'Provider',
            'config_data' => 'Config Data',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Merchant]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMerchant()
    {
        return $this->hasOne(Merchant::class, ['id' => 'merchant_id']);
    }


    /**
     * column payment_type ENUM value labels
     * @return string[]
     */
    public static function optsPaymentType()
    {
        return [
            self::PAYMENT_TYPE_MOBILE => 'mobile',
            self::PAYMENT_TYPE_CARD => 'card',
            self::PAYMENT_TYPE_BANK => 'bank',
        ];
    }

    /**
     * @return string
     */
    public function displayPaymentType()
    {
        return self::optsPaymentType()[$this->payment_type];
    }

    /**
     * @return bool
     */
    public function isPaymentTypeMobile()
    {
        return $this->payment_type === self::PAYMENT_TYPE_MOBILE;
    }

    public function setPaymentTypeToMobile()
    {
        $this->payment_type = self::PAYMENT_TYPE_MOBILE;
    }

    /**
     * @return bool
     */
    public function isPaymentTypeCard()
    {
        return $this->payment_type === self::PAYMENT_TYPE_CARD;
    }

    public function setPaymentTypeToCard()
    {
        $this->payment_type = self::PAYMENT_TYPE_CARD;
    }

    /**
     * @return bool
     */
    public function isPaymentTypeBank()
    {
        return $this->payment_type === self::PAYMENT_TYPE_BANK;
    }

    public function setPaymentTypeToBank()
    {
        $this->payment_type = self::PAYMENT_TYPE_BANK;
    }
}
