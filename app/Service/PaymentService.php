<?php

namespace App\Service;

use YooKassa\Client;

class PaymentService
{
    private function getClient(): Client
    {
        $client = new Client();
        $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.secret_key'));

        return $client;
    }

    public function createPayment(float $amount, string $description, array $options = [])
    {
        $client = $this->getClient();
        $payment = $client->createPayment([
            'amount' => [
                'value' => $amount,
                'currency' => 'RUB',
            ],
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => route('payment.callback'),
            ],
            'metadata' => [
                'transaction_id' => $options['transaction_id'],
            ],
            'capture' => false,
            'description' => $description,
        ],
            uniqid('', true)
        );

        return $payment->getConfirmationUrl();
    }
}
