<?php

namespace app\models\service;

use app\models\Transaction;

class TransactionService {
    public const SOURCE_PAYME = 'payme';

    public const TYPE_TOP_UP = 'top-up';
    public const TYPE_BONUS = 'bonus';
    public const TYPE_EXPENSE = 'expense';
    public const TYPE_REFUND = 'refund';


    public const INCREMENT = [
        self::TYPE_TOP_UP,
        self::TYPE_BONUS,
    ];

    public const DECREMENT = [
        self::TYPE_EXPENSE,
        self::TYPE_REFUND,
    ];

    public static function userBalance(int $user_id): int {
        $balance = 0;

        /** @var Transaction $transactions */
        $transactions = Transaction::find()->where(['user_id' => $user_id])->all();

        foreach ($transactions as $transaction) {
            if (in_array($transaction->type, self::INCREMENT)) {
                $balance += $transaction->amount;
            } elseif (in_array($transaction->type, self::DECREMENT)) {
                $balance -= $transaction->amount;
            }
        }

        return self::inUZS($balance);
    }

    protected static function inUZS($amount): int {
        return $amount / 100;
    }
}