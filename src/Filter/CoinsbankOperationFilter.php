<?php

namespace Coinsbank\Filter;

use Coinsbank\Model\CoinsbankModel;

/**
 * Class CoinsbankOperationFilter
 *
 * @package Coinsbank\Filter
 *
 * @method CoinsbankOperationFilter setAccountId($value)
 * @method CoinsbankOperationFilter setAccountName($value)
 * @method CoinsbankOperationFilter setAmountFrom($value)
 * @method CoinsbankOperationFilter setAmountTo($value)
 * @method CoinsbankOperationFilter setCurrency($value)
 * @method CoinsbankOperationFilter setDateCreateFrom($value)
 * @method CoinsbankOperationFilter setDateCreateTo($value)
 * @method CoinsbankOperationFilter setDateUpdateFrom($value)
 * @method CoinsbankOperationFilter setDateUpdateTo($value)
 * @method CoinsbankOperationFilter setIsActive($value)
 * @method CoinsbankOperationFilter setOperationType($value)
 * @method CoinsbankOperationFilter setStatus($value)
 * @method CoinsbankOperationFilter setUserComment($value)
 */
class CoinsbankOperationFilter extends CoinsbankModel
{
    /**
     * @var string|string[]
     */
    public $accountId;

    /**
     * @var string|string[]
     */
    public $accountName;

    /**
     * @var double
     */
    public $amountFrom;

    /**
     * @var double
     */
    public $amountTo;

    /**
     * @var string|string[]
     */
    public $currency;

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
    public $isActive;

    /**
     * @var string|string[]
     */
    public $operationType;

    /**
     * @var integer|integer[]
     */
    public $status;

    /**
     * @var string
     */
    public $userComment;
}