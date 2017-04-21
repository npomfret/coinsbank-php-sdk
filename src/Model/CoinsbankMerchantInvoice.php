<?php

namespace Coinsbank\Model;

/**
 * Class CoinsbankMerchantInvoice
 *
 * @package Coinsbank\Model
 */
class CoinsbankMerchantInvoice extends CoinsbankModel
{
    public $amount;
    public $currency;
    public $serviceName;
    public $serviceDescription;
    public $merchantNumber;
    public $ttl;
    public $buyerEmail;
    public $buyerPhone;
    public $acceptCrypto;
    public $currencyWish;
    public $acceptFiat;
    public $customerAddress;
    public $customerFullName;
    public $customerCity;
    public $customerCountry;
    public $customerZip;
    public $customerRegion;
    public $commissionType;

    public $status;
    public $dateCreate;
    public $dateSent;
    public $dateRead;
    public $dateStartEnrollment;
    public $dateEndEnrollment;
    public $dateSuccess;
    public $dateCancel;
    public $linkHash;
    public $addressBTC;
    public $addressLTC;
    public $amountCrypto;
    public $validTo;
    public $payInCurrency;
}