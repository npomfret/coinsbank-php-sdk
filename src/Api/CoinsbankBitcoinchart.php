<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankApi;

/**
 * Class CoinsbankBitcoinchart
 *
 * @package Coinsbank\Api
 */
class CoinsbankBitcoinchart extends CoinsbankApi
{
    const URL_TRADES = '/bitcoincharts/trades';
    const URL_ORDERBOOK = '/bitcoincharts/orderbook';

    /**
     * Gets trade history.
     *
     * @param string $currencyPair
     * @return \Coinsbank\Transport\CoinsbankResponse
     */
    public function getTrades($currencyPair)
    {
        return $this->get(self::URL_TRADES . '/' . $currencyPair);
    }

    /**
     * Gets orderbook.
     *
     * @param string $currencyPair
     * @return \Coinsbank\Transport\CoinsbankResponse
     */
    public function getOrderBook($currencyPair)
    {
        return $this->get(self::URL_ORDERBOOK . '/' . $currencyPair);
    }
}