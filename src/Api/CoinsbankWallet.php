<?php

namespace Coinsbank\Api;

use Coinsbank\Coinsbank;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class CoinsbankAccount
 *
 * @package Coinsbank\Api
 */
class CoinsbankWallet extends Coinsbank
{
    const URL = '/wallet';

    /**
     * Gets wallets list.
     *
     * @return CoinsbankResponse
     */
    public function getList()
    {
        return $this->get(self::URL);
    }
}