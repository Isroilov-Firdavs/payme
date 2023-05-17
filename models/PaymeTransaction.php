<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payme_transaction".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $transaction_id
 * @property int $state
 * @property int $amount
 * @property int|null $reason
 * @property int|null $perform_time
 * @property int|null $cancel_time
 * @property int $create_time
 */
class PaymeTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payme_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'state', 'amount', 'reason', 'perform_time', 'cancel_time', 'create_time'], 'integer'],
            [['transaction_id', 'state', 'amount', 'create_time'], 'required'],
            [['transaction_id'], 'string', 'max' => 24],
            [['transaction_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'transaction_id' => 'Transaction ID',
            'state' => 'State',
            'amount' => 'Amount',
            'reason' => 'Reason',
            'perform_time' => 'Perform Time',
            'cancel_time' => 'Cancel Time',
            'create_time' => 'Create Time',
        ];
    }
}
