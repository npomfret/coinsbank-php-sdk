<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Constant\CoinsbankRest;
use Coinsbank\Filter\CoinsbankMerchantFilter;
use Coinsbank\Model\CoinsbankMerchantInvoice;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class Merchant
 *
 * @package Coinsbank\Api
 */
class CoinsbankMerchant extends CoinsbankSapi
{
    const URL = '/merchant';

    /**
     * Returns invoices list.
     *
     * @param int $page
     * @param int $pageSize
     * @param array|CoinsbankMerchantFilter $filter
     * @param bool $exportPDF
     * @return CoinsbankResponse
     */
    public function getData(
        $page = 0,
        $pageSize = CoinsbankRest::DEFAULT_PAGE_SIZE,
        $filter = [],
        $exportPDF = false
    ) {
        return $this->get(self::URL, compact('page', 'pageSize', 'filter', 'exportPDF'));
    }

    /**
     * Returns invoice details.
     *
     * @param string $id
     * @return CoinsbankResponse
     */
    public function getInvoiceData($id)
    {
        return $this->get($this->getPathWithId(self::URL, $id));
    }

    /**
     * Creates invoice.
     *
     * @param array|CoinsbankMerchantInvoice $data
     * @return CoinsbankResponse
     */
    public function createInvoice($data)
    {
        return $this->post(self::URL, $data);
    }
}