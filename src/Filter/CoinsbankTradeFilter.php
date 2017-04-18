<?php

namespace Coinsbank\Filter;

use Coinsbank\Exception\CoinsbankSDKException;

/**
 * Class CoinsbankTradeFilter
 *
 * @package Coinsbank\Filter
 *
 * @method CoinsbankTradeFilter setAccountIdFrom($value)
 * @method CoinsbankTradeFilter setAccountIdTo($value)
 * @method CoinsbankTradeFilter setAmountGetFrom($value)
 * @method CoinsbankTradeFilter setAmountGetTo($value)
 * @method CoinsbankTradeFilter setAmountPayFrom($value)
 * @method CoinsbankTradeFilter setAmountPayTo($value)
 * @method CoinsbankTradeFilter setCurrencyGet($value)
 * @method CoinsbankTradeFilter setCurrencyPair($value)
 * @method CoinsbankTradeFilter setDateCreateFrom($value)
 * @method CoinsbankTradeFilter setDateCreateTo($value)
 * @method CoinsbankTradeFilter setDateUpdateFrom($value)
 * @method CoinsbankTradeFilter setDateUpdateTo($value)
 * @method CoinsbankTradeFilter setDirection($value)
 * @method CoinsbankTradeFilter setExchangeRateFrom($value)
 * @method CoinsbankTradeFilter setExchangeRateTo($value)
 * @method CoinsbankTradeFilter setOrderNumber($value)
 * @method CoinsbankTradeFilter setStatus($value)
 * @method CoinsbankTradeFilter setStopLoss($value)
 * @method CoinsbankTradeFilter setTakeProfit($value)
 * @method CoinsbankTradeFilter setTriggeredBy($value)
 * @method CoinsbankTradeFilter setType($value)
 */
class CoinsbankTradeFilter
{
    /**
     * @var string|string[]
     */
    public $accountIdFrom;

    /**
     * @var string|string[]
     */
    public $accountIdTo;

    /**
     * @var double
     */
    public $amountGetFrom;

    /**
     * @var double
     */
    public $amountGetTo;

    /**
     * @var double
     */
    public $amountPayFrom;

    /**
     * @var double
     */
    public $amountPayTo;

    /**
     * @var string|string[]
     */
    public $currencyGet;

    /**
     * @var string|string[]
     */
    public $currencyPair;

    /**
     * @var string|string[]
     */
    public $currencyPay;

    /**
     * @var string
     */
    public $dateCreateFrom;

    /**
     * @var string
     */
    public $dateCreateTo;

    /**
     * @var string
     */
    public $dateUpdateFrom;

    /**
     * @var string
     */
    public $dateUpdateTo;

    /**
     * @var boolean
     */
    public $direction;

    /**
     * @var double
     */
    public $exchangeRateFrom;

    /**
     * @var double
     */
    public $exchangeRateTo;

    /**
     * @var string
     */
    public $orderNumber;

    /**
     * @var integer|integer[]
     */
    public $status;

    /**
     * @var boolean
     */
    public $stopLoss;

    /**
     * @var boolean
     */
    public $takeProfit;

    /**
     * @var string|string[]
     */
    public $triggeredBy;

    /**
     * @var integer|integer[]
     */
    public $type;


    public function __call($name, $arguments)
    {
        if (strpos($name, 'set') === 0 && strlen($name) > 3) {
            $property = lcfirst(substr($name, 3));
            if (property_exists($this, $property)) {
                if (isset($arguments[0])) {
                    $this->$property = $arguments[0];
                } else {
                    throw new CoinsbankSDKException('No value for property "' . $property . '""');
                }

                return $this;
            } else {
                throw new CoinsbankSDKException('Unknown property "' . $property . '""');
            }
        }
    }
}