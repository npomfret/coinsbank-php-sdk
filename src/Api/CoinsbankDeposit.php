<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Model\CoinsbankDepositModel;

/**
 * Class Deposit
 *
 * @package Coinsbank\Api
 *
 */
class CoinsbankDeposit extends CoinsbankSapi
{
    const URL = '/wallet/deposit';

    /**
     * Creates deposit.
     *
     * @param array|CoinsbankDepositModel $data
     * @return \Coinsbank\Transport\CoinsbankResponse
     */
    public function createDeposit($data)
    {
        return $this->post(self::URL, $data);
    }
}