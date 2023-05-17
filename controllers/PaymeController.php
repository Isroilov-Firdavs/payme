<?php

namespace app\controllers;

use app\models\PaymeTransaction;
use app\models\service\TransactionService;
use app\models\User;
use app\models\Transaction;
use uzdevid\payme\merchant\savings\SavingsAccount;
use uzdevid\payme\merchant\savings\SavingsControllerInterface;

class PaymeController extends SavingsAccount implements SavingsControllerInterface
{
    public function init(): void {
        $this->key = "";
        parent::init();
    }

    function userClass(): string
    {
        return User::class;
    }

    function transactionClass(): string
    {
        return PaymeTransaction::class;
    }

    function checkAmount(int $amount): bool
    {
        return $amount > 10000 && $amount < 1000000000;

    }

    function allowTransaction(array $payload): bool
    {
        return true;
    }

    function transactionPerformed($transaction): void
    {
        /** @var PaymeTransaction $transaction */

        $model = new Transaction();
        $model->source = 'payme'; // payme
        $model->source_id = $transaction->id;
        $model->user_id = $transaction->user_id;
        $model->amount = $transaction->amount;
        $model->type = 'top-up'; // top-up
        $model->create_time = time() * 1000;
        $model->save();
    }

    function allowRefund($transaction): bool
    {
        return true;
    }

    function userBalance(int $userId): int
    {
        return TransactionService::userBalance($userId) * 100;
    }

    function refund($transaction): void
    {
        /** @var PaymeTransaction $transaction */

        $model = new Transaction();
        $model->user_id = $transaction->user_id;
        $model->amount = $transaction->amount;
        $model->type = 'refund'; // refund
        $model->create_time = time() * 1000;
        $model->save();
    }
}