<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Constant\CoinsbankRest;
use Coinsbank\Filter\CoinsbankOperationFilter;
use Coinsbank\Transport\CoinsbankResponse;

class CoinsbankOperation extends CoinsbankSapi
{
    const URL = '/operation';
    const URL_WALLET = self::URL . '/wallet';
    const URL_CARD = self::URL . '/card';

    /**
     * Returns operations list.
     *
     * @param int $page
     * @param int $pageSize
     * @param array|CoinsbankOperationFilter $filter
     * @param array $sort Array, e.g. ['column_name1' => CSort::ASC, ...]
     * @param bool $exportPDF
     * @return CoinsbankResponse
     */
    public function getData(
        $page = 0,
        $pageSize = CoinsbankRest::DEFAULT_PAGE_SIZE,
        $filter = [],
        $sort = [],
        $exportPDF = false
    ) {
        return $this->get(self::URL, compact('page', 'pageSize', 'filter', 'sort', 'exportPDF'));
    }

    /**
     * Returns wallet operations list.
     *
     * @param string $accountId
     * @param int $page
     * @param int $pageSize
     * @param array|CoinsbankOperationFilter $filter
     * @param array $sort Array, e.g. ['column_name1' => CSort::ASC, ...]
     * @param bool $exportPDF
     * @return CoinsbankResponse
     */
    public function getWalletData(
        $accountId,
        $page = 0,
        $pageSize = CoinsbankRest::DEFAULT_PAGE_SIZE,
        $filter = [],
        $sort = [],
        $exportPDF = false
    ) {
        return $this->get($this->getPathWithId(self::URL_WALLET, $accountId), compact('page', 'pageSize', 'filter', 'sort', 'exportPDF'));
    }
}