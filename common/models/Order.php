<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $merchant_id
 * @property string $product_name
 * @property float $total_amount
 * @property string|null $status
 * @property string|null $created_at
 *
 * @property Merchant $merchant
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_PENDING = 'pending';
    const STATUS_PAID = 'paid';
    const STATUS_FAILED = 'failed';

    public static function tableName()
    {
        return 'order';
    }

    /**
     * ✅ Automatically sets `created_at` to current datetime
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules()
    {
        return [
            [['status'], 'default', 'value' => self::STATUS_PENDING],
            [['merchant_id', 'product_name', 'total_amount'], 'required'],
            [['merchant_id'], 'integer'],
            [['total_amount'], 'number'],
            [['status'], 'string'],
            [['created_at'], 'safe'],
            [['product_name'], 'string', 'max' => 100],
            ['status', 'in', 'range' => array_keys(self::optsStatus())],
            [['merchant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Merchant::class, 'targetAttribute' => ['merchant_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_id' => 'Merchant ID',
            'product_name' => 'Product Name',
            'total_amount' => 'Total Amount',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public function getMerchant()
    {
        return $this->hasOne(Merchant::class, ['id' => 'merchant_id']);
    }

    public static function optsStatus()
    {
        return [
            self::STATUS_PENDING => 'pending',
            self::STATUS_PAID => 'paid',
            self::STATUS_FAILED => 'failed',
        ];
    }

    public function displayStatus()
    {
        return self::optsStatus()[$this->status];
    }

    public function isStatusPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function setStatusToPending()
    {
        $this->status = self::STATUS_PENDING;
    }

    public function isStatusPaid()
    {
        return $this->status === self::STATUS_PAID;
    }

    public function setStatusToPaid()
    {
        $this->status = self::STATUS_PAID;
    }

    public function isStatusFailed()
    {
        return $this->status === self::STATUS_FAILED;
    }

    public function setStatusToFailed()
    {
        $this->status = self::STATUS_FAILED;
    }
}
