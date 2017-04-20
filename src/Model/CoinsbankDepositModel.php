<?php

namespace Coinsbank\Model;

use Coinsbank\Api\CoinsbankFile;

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
     * @var string Wallet for income.
     */
    public $accountId;

    /**
     * @var string Phone number for QWI.
     */
    public $address;

    /**
     * @var double Deposit amount.
     */
    public $amount;

    /**
     * @var integer Country ID.
     */
    public $countryId;

    /**
     * @var string Amount currency.
     */
    public $currency;

    /**
     * @var array|CoinsbankFileModel File data of the person document (front side) for WRT/SEP required if isn't set in verification.
     * @see CoinsbankFile::uploadFile
     */
    public $documentPersonFront;

    /**
     * @var array|CoinsbankFileModel File data of the person document (back side) for WRT/SEP available for saving if isn't set in verification.
     * @see CoinsbankFile::uploadFile
     */
    public $documentPersonBack;

    /**
     * @var string First Name, required for FSC, for WRT/SEP required if isn't set in verification.
     */
    public $firstName;

    /**
     * @var string Last Name, required for FSC, for WRT/SEP required if isn't set in verification.
     */
    public $lastName;

    /**
     * @var string Payer account number, required for WRT/SEP if verification level less than 3.
     */
    public $payerAccount;

    /**
     * @var string The list of available payment systems's returned by method:
     * @see CoinsbankDeposit::getAvailable
     */
    public $paymentSystem;
}