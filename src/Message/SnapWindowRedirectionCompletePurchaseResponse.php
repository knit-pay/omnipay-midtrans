<?php

namespace Omnipay\Midtrans\Message;

use Omnipay\Common\Message\AbstractResponse;

class SnapWindowRedirectionCompletePurchaseResponse extends AbstractResponse
{
    public function isPending()
    {
        return $this->getData()['transaction_status'] === 'pending';
    }

    public function isCancelled()
    {
        return $this->getData()['transaction_status'] === 'cancel';
    }

    public function isDeclined()
    {
        return $this->getData()['transaction_status'] === 'deny' || $this->getData()['transaction_status'] === 'expire';
    }

    public function isSuccessful()
    {
        return $this->getData()['transaction_status'] === 'capture' || $this->getData()['transaction_status'] === 'settlement';
    }

    public function getTransactionReference()
    {
        return $this->getData()['transaction_id'];
    }
    
    public function getData(){
        return json_decode($this->data, true);
    }
}
