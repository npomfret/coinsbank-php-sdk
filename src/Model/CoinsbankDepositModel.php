<?php

namespace Coinsbank\Model;

/**
 * Class CoinsbankDepositModel
 *
 * @package Coinsbank\Model
 *
 * @method CoinsbankDepositModel setAccountId($value)
 * @method CoinsbankDepositModel setAddress($value)
 * @method CoinsbankDepositModel setAmount($value)
 * @method CoinsbankDepositModel setCountryId($value)
 * @method CoinsbankDepositModel setCurrency($value)
 * @method CoinsbankDepositModel setDocumentPersonFront($value)
 * @method CoinsbankDepositModel setDocumentPersonBack($value)
 * @method CoinsbankDepositModel setFirstName($value)
 * @method CoinsbankDepositModel setLastName($value)
 * @method CoinsbankDepositModel setPayerAccount($value)
 * @method CoinsbankDepositModel setPaymentSystem($value)
 */
class CoinsbankDepositModel extends CoinsbankModel
{
    /**
     * @var string
     */
    public $accountId;

    /**
     * @var string
     */
    public $address;

    /**
     * @var double
     */
    public $amount;

    /**
     * @var integer
     */
    public $countryId;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var array
     */
    public $documentPersonFront;

    /**
     * @var array
     */
    public $documentPersonBack;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $payerAccount;

    /**
     * @var string
     */
    public $paymentSystem;
}