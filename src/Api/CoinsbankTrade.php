<?php

namespace Coinsbank\Api;

use Coinsbank\Coinsbank;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class Trade
 *
 * @package Coinsbank\Api
 */
class CoinsbankTrade extends Coinsbank
{
    const URL = '/trade';
    const URL_HISTORY = '/trade/closing';
    const URL_FEE = '/trade/fee';

    const DIRECTION_BUY = 'buy';
    const DIRECTION_SELL = 'sell';

    const COMMISSION_TYPE_FROM = 0;
    const COMMISSION_TYPE_TO = 1;

    const ACTION_RESET_TP = 'resettp';
    const ACTION_RESET_SL = 'resetsl';
    const ACTION_RESET_SL_TP = 'resetsltp';

    /**
     * Cancels trade order.
     *
     * @param $id
     * @return CoinsbankResponse
     */
    public function cancelOrder($id)
    {
        return $this->delete($this->getPathWithId(self::URL, $id));
    }

    /**
     * Creates new trade order.
     *
     * @param $fromUserAccount
     * @param $toUserAccount
     * @param $amount
     * @param $commissionType - Where is commission get from (source or dest account)
     * @param $direction - What's amount relative to (sell - fromUserAccount, buy - toUserAccount
     * @param null $exchangeRate
     * @param null $stopLoss
     * @param null $takeProfit
     * @return CoinsbankResponse
     */
    public function createNewOrder(
        $fromUserAccount,
        $toUserAccount,
        $amount,
        $commissionType,
        $direction,
        $exchangeRate = null,
        $stopLoss = null,
        $takeProfit = null
    ) {
        return $this->post(self::URL, compact('fromUserAccount', 'toUserAccount', 'amount', 'commissionType', 'direction', 'exchangeRate', 'stopLoss', 'takeProfit'));
    }

    /**
     * Gets fee data.
     *
     * @param $fromUserAccount
     * @param $toUserAccount
     * @param $amount
     * @param $commissionType
     * @param $direction
     * @param null $exchangeRate
     * @param null $stopLoss
     * @param null $takeProfit
     * @return CoinsbankResponse
     */
    public function getFeeData(
        $fromUserAccount,
        $toUserAccount,
        $amount,
        $commissionType,
        $direction,
        $exchangeRate = null,
        $stopLoss = null,
        $takeProfit = null
    ) {
        return $this->get(self::URL_FEE, compact('fromUserAccount', 'toUserAccount', 'amount', 'commissionType', 'direction', 'exchangeRate', 'stopLoss', 'takeProfit'));
    }

    /**
     * Return trade order info.
     *
     * @param $id
     * @return CoinsbankResponse
     */
    public function getOrder($id)
    {
        return $this->get($this->getPathWithId(self::URL, $id));
    }

    /**
     * Returns trade orders list.
     *
     * @param int $page
     * @param int $pageSize
     * @param array $distinct
     * @param array $sort
     * @param bool $exportPDF
     * @param array $filter
     * @return CoinsbankResponse
     */
    public function getOrders(
        $page = 0,
        $pageSize = self::DEFAULT_PAGE_SIZE,
        $distinct = [],
        $sort = [],
        $exportPDF = false,
        $filter = []//todo: сделать объектом
    )
    {
        return $this->get(self::URL, compact('page', 'pageSize', 'distinct', 'sort', 'exportPDF', 'stopLoss', 'filter'));
    }

    /**
     * Returns order closing history.
     *
     * @param $id
     * @return CoinsbankResponse
     */
    public function orderHistory($id)
    {
        return $this->get($this->getPathWithId(self::URL_HISTORY, $id));
    }

    /**
     * Updates trade order (resets tp, sl, sltp).
     *
     * @param $id
     * @param $action
     * @return CoinsbankResponse
     */
    public function updateOrder($id, $action)
    {
        return $this->put($this->getPathWithId(self::URL, $id), compact('action'));
    }
}